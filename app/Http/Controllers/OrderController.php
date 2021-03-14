<?php

namespace teaco\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use teaco\Http\Controllers\view;
use Carbon\Carbon;
use teaco\Order;
use teaco\Balance;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function indexMenu()
    {
    	$menus= DB::table('menus')
    				->whereNotNull('menu_name')
    				->select('menu_id','menu_name')
    				->get();
        $packetm = DB::table('packet_has_menus')
                    ->join('packets', 'packets.id', '=', 'packet_has_menus.packet_id')
                    ->select('packets.id','packets.packet_name')
                    ->get();

        $oid = Order::all()->max('order_id');
       
        $dateNow = Carbon::now('Asia/Jakarta');
        $dateNowFormat = $dateNow->format('mdYHis');
        $dateField = $dateNow->format('m/d/Y H:i:s');

        $oidn = (int) substr($oid, 15,24);
        $joinkode = "T". sprintf($dateNowFormat). sprintf("%010s", $oidn);

        DB::table('orders')->where('order_id', $oid)
            ->update(['order_id' => $joinkode]);


        $board = DB::table('boards')
                    ->whereNull('board_status')
                    ->select('board_id')
                    ->get();

    	return View('user.User_CreateOrder')->with('menus', $menus)->with('packetm',$packetm)->with('o_id', $joinkode)->with('date', $dateField)->with('boards', $board);
    }



    public function getPrice($menu_id)
    {
    	$prices = DB::table('menus')
    					->where('menu_id', $menu_id)
    					->select('menu_id', 'menu_name','menu_price', 'menu_stock')
    					->get();

    	return response()->json($prices);
    }

    public function getPacket($packet_id)
    {
        $packets = DB::table('packet_has_menus')
                        ->where('packet_id', $packet_id)
                        ->join('menus', 'packet_has_menus.menu_id', '=', 'menus.menu_id')
                        ->select('packet_has_menus.packet_id','menus.menu_id', 'menus.menu_name', 'menus.menu_stock',DB::raw('SUM(menus.menu_price) as totalprice'))
                        ->groupBy('packet_has_menus.packet_id','menus.menu_id', 'menus.menu_name', 'menus.menu_stock')
                        ->get();

        return response()->json($packets);
    }

    public function createOrder(Request $request)
{   
        $oid = $request->input('oidn');
        $oidt = $request->input('odaten');
        $odateo = substr($oidt, 0,10);
        $otimeo = substr($oidt, 11,8);

        $oboard = $request->input('oboardn');
        $opay = $request->input('opay');
        $menulist = $request->input('olist');
        $detailmenulist = $request->input('odlist');
        $menulistj = json_decode($menulist);
        $detailmenulistj = json_decode($detailmenulist);

    try{
        foreach($menulistj as $key => $value) {
          $od =  DB::table('orders')->where('order_id', $oid)
            ->update(['order_date' => $odateo,
                    'order_time' => $otimeo,
                    'order_board' => $value->oboard,
                    'customer_name' => $value->cname,
                    'order_payment' => $value->opay]);
        }
    } catch(Exception $e){
        DB::rollBack();
        // return $e->getMessage();
        return redirect()->route('home')->with('danger', 'Order Failed');
    }        

        if($od)
        {
            DB::table('boards')->where('board_id', $oboard)
            ->update(['board_status' => 1]);
        }else{
            DB::rollBack();
            return redirect()->route('home')->with('danger', 'Order Failed');
        }

    try{

        foreach ($detailmenulistj as $key => $value) {
            DB::table('order_has_menus')->insert([
                'menu_id' => $value->mid,
                'menu_quantity' => $value->quantity,
                'order_id'=> $oid
            ]);

            $stock = DB::table('menus')->where('menu_id', $value->mid)
                    ->select('menu_stock')
                    ->get();
            $plucked = $stock->pluck('menu_stock');    
            $stockn = implode($plucked->all());

            DB::table('menus')->where('menu_id', $value->mid)
                ->update(['menu_stock' => $stockn-$value->quantity]);
        }
    } catch(Exception $e){
        DB::rollBack();
        return redirect()->route('home')->with('danger', 'Order Failed');
    }

        $odate = substr($oid, 1,14);
        $onum = (int) substr($oid, 15,24);   
        $onumn  = $onum + 1;
        $join = "T". sprintf($odate). sprintf("%010s", $onumn);

        DB::table('orders')->insert(['order_id' => $join]);

        $rpayment = DB::table('orders')
                    ->join('order_has_menus', 'order_has_menus.order_id', '=', 'orders.order_id')
                    ->join('menus', 'menus.menu_id', '=', 'order_has_menus.menu_id')
                    ->whereNotNull('orders.customer_name')
                    ->where('orders.order_id', $oid)
                    ->select(DB::raw("(orders.order_payment-SUM(menus.menu_price * order_has_menus.menu_quantity)) as totpayment"))
                    ->groupBy('orders.order_payment')
                    ->get();

        $b = Balance::all()->max('id');
        $bal = Balance::where('id', $b)->get(['balance']);  
        $plucked = $bal->pluck('balance');    
        $balint = implode($plucked->all());

        $totbal = $balint + $opay;
                Balance::create([
                    'balance_date' => $odateo,
                    'balance_time' => $otimeo,
                    'balance' => $totbal,
                    'money_in' => $opay,
                ]);

        $plucked = $rpayment->pluck('totpayment');    
        $rp = implode($plucked->all());

        if($rp == 0 || $rp > 0){
            DB::table('orders')->where('order_id', $oid)
            ->update(['order_status' => 'paid']);
            if($rp > 0){
                $bc = Balance::all()->max('id');
                $balc = Balance::where('id', $bc)->get(['balance']);  
                $plucked = $balc->pluck('balance');    
                $balintc = implode($plucked->all());
                    $totbalc = $balintc - $rp;
                        Balance::create([
                            'balance_date' => $odateo,
                            'balance_time' => $otimeo,
                            'balance' => $totbalc,
                            'money_out' => $rp,
                        ]);
            }
        }

        return View('user.User_SuccessOrder')->with('cashback', $rp)->with('success', 'payment success');
}

    public function getOrder()
    {
        $orders = DB::table('orders')
                        ->whereNotNull('customer_name')
                        ->select('order_id', 'order_date', 'order_time','customer_name', 'order_status')
                        ->get();
        $menus = DB::table('orders')
                        ->join('order_has_menus', 'order_has_menus.order_id', '=', 'orders.order_id')
                        ->join('menus', 'order_has_menus.menu_id', '=', 'menus.menu_id')
                        ->whereNotNull('customer_name')
                        ->select('order_has_menus.order_id', 'order_has_menus.menu_id', 'menus.menu_name', 'menus.menu_price')
                        ->get();

        return view('user.User_ViewOrder')->with('orders', $orders)->with('menus', $menus);
    }
}
