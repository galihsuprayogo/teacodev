<?php

namespace teaco\Http\Controllers;

use teaco\Menu;
use teaco\Unit;
use teaco\Type;
use teaco\Http\Controllers\view;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('menum');
    }

    public function indexMenu()
    {
    	$menu_id = Menu::all()->max('menu_id');
    	$units = Unit::all();
    	$types = Type::all();
    	return View('admin.Admin_CreateMenu')->with('menu_id', $menu_id)->
    	with('units', $units)->with('types', $types);
    }



    public function createMenu(Request $request)
    {
    	$id = $request->input('menuid');
    	$idn = (int) substr($id, 2, 5);
        $idn = $idn + 1;
        $joinid = "MU" . sprintf("%03s", $idn);
    	$name = $request->input('menuname');
    	$stock = $request->input('menustock');
    	$unit = $request->input('menuunit');
    	$type = $request->input('menutype');
    	$price = $request->input('menuprice');
    	$discount = $request->input('menudiscount');
    
   
    		DB::table('menus')->where('menu_id', $id)
    		->update(['menu_name' => $name,
    				'menu_stock' => $stock,
    				'menu_unit' => $unit,
    				'menu_type' => $type,
    				'menu_price' => $price,
    				'menu_discount' => $discount]);
    		 Menu::create([
    			'menu_id' => $joinid
    		]);	
    	return redirect('/viewmenu')->with('success', 'create new menu success');
    }

    public function getMenu()
    {
    	$menus= DB::table('menus')
    				->join('units', 'menus.menu_unit', '=', 'units.id')
    				->join('types', 'menus.menu_type', '=', 'types.id')
                    ->whereNotNull('menu_name')
                    ->select('menus.menu_id', 'menus.menu_name', 
                    	'menus.menu_stock', 'units.unit_name', 'types.type_name',
                		'menus.menu_price', 'menus.menu_discount')
                    ->get();
    	return View('admin.Admin_ViewMenu', compact('menus'));
    }

    public function deleteMenu($menu_id)
    {
    	DB::table('menus')->where('menu_id', $menu_id)->delete();
    	return redirect('/viewmenu')->with('success', 'delete menu success');
    }

    public function getEditMenu($menu_id)
    {
    	$menus= DB::table('menus')
    				->join('units', 'menus.menu_unit', '=', 'units.id')
    				->join('types', 'menus.menu_type', '=', 'types.id')
                    ->where('menu_id', $menu_id)
                    ->select('menus.menu_id', 'menus.menu_name', 
                    	'menus.menu_stock', 'units.unit_name', 'types.type_name',
                		'menus.menu_price', 'menus.menu_discount')
                    ->get();
        $units = Unit::all();
    	$types = Type::all();
    	return View('admin.Admin_EditMenu')->with('menus', $menus)->
    	with('units', $units)->with('types', $types);
    }

    public function updateMenu(Request $request, $menu_id)
    {
    	$id = $request->input('menuid');
    	$name = $request->input('menuname');
    	$stock = $request->input('menustock');
    	$unit = $request->input('menuunit');
    	$type = $request->input('menutype');
    	$price = $request->input('menuprice');
    	$discount = $request->input('menudiscount');

    	DB::table('menus')->where('menu_id', $id)
    		->update(['menu_name' => $name,
    				'menu_stock' => $stock,
    				'menu_unit' => $unit,
    				'menu_type' => $type,
    				'menu_price' => $price,
    				'menu_discount' => $discount]);
    	return redirect('/viewmenu')->with('success', 'update menu success');
    }

     public function indexPacketMenu()
    {
        $packets = DB::table('packets')
                    ->whereNull('packet_status')
                    ->select('id', 'packet_name')
                    ->get();
        $menus= DB::table('menus')
                    ->whereNotNull('menu_name')
                    ->where('menu_stock', '!=', 0)
                    ->select('menu_id', 'menu_name', 
                        'menu_stock', 'menus.menu_price')
                    ->get();
        return View('admin.Admin_CreatePacketMenu', compact('packets', 'menus'));
    }

     public function createPacketMenu(Request $request)
    {
        $packetid = $request->input('packetid');
        $menuid = $request->input('menuid');

        foreach ($menuid as $id) {
            DB::table('packet_has_menus')->insert([
            ['packet_id' => $packetid, 'menu_id' => $id]
        ]);
        }

        DB::table('packets')->where('id', $packetid)
            ->update(['packet_status' => 1]);

        return redirect('/viewpacketmenu')->with('success', 'create new packet success');
    }

     public function getPacketMenu()
    {
        $packetmenus= DB::table('packet_has_menus')
                    ->join('packets', 'packet_has_menus.packet_id', '=', 'packets.id')
                    ->join('menus', 'packet_has_menus.menu_id', '=', 'menus.menu_id')
                    ->whereNotNull('menus.menu_name')
                    ->whereNotNull('packets.packet_status')
                    ->select('packets.id', 'packets.packet_name', 'menus.menu_id', 'menus.menu_name', 'menus.menu_stock', 'menu_price')
                    ->get();
        $packets = DB::table('packet_has_menus')
                    ->join('packets', 'packet_has_menus.packet_id', '=', 'packets.id')
                    ->select('packet_has_menus.packet_id')
                    ->get();

        return View('admin.Admin_ViewPacketMenu', ['packetmenus' => $packetmenus], ['packets' => $packets]);
    }

     public function deletePacketMenu($packet_id)
    {
        DB::table('packet_has_menus')->where('packet_id', $packet_id)->delete();

        DB::table('packets')->where('id', $packet_id)
            ->update(['packet_status' => null]);

        return redirect('/viewpacketmenu')->with('success', 'delete packet menu success');
    }

     public function deleteMenuPacket($menu_id, $packet_id)
    {
        DB::table('packet_has_menus')
                ->join('packets', 'packet_has_menus.packet_id', '=', 'packets.id')
                ->where('packet_has_menus.packet_id', $packet_id)
                ->where('menu_id', $menu_id)->delete();

        return redirect('/viewpacketmenu')->with('success', 'delete menu success');        
    }

    public function getEditMenuPacket($packet_id)
    {

        $packets= DB::table('packet_has_menus')
                    ->join('packets', 'packet_has_menus.packet_id', '=', 'packets.id')
                    ->join('menus', 'packet_has_menus.menu_id', '=', 'menus.menu_id')
                    ->where('packet_has_menus.packet_id', $packet_id)
                    ->whereNotNull('menus.menu_name')
                    ->whereNotNull('packets.packet_status')
                    ->select('packets.id', 'packets.packet_name', 'menus.menu_id', 'menus.menu_name', 'menus.menu_stock', 'menu_price')
                    ->get();
        $menus= DB::table('menus')
                    ->whereNotNull('menu_name')
                    ->select('menu_id', 'menu_name', 
                        'menu_stock','menu_price')
                    ->get();
        return View('admin.Admin_EditPacketMenu')->with('packet_id', $packet_id)->with('packets', $packets)->with('menus', $menus);
    }

    public function updateMenuPacket(Request $request, $packet_id)
    {
        // $packet_id = DB::table('packet_has_menus')
        //             ->where('menu_id', $menu_id)
        //             ->select('packet_id')
        //             ->get();
        
        // $plucked = $packet_id->pluck('packet_id');    
        // $pid = implode($plucked->all());
        
       
        DB::table('packet_has_menus')->where('packet_id', $packet_id)->delete();
        $menuid = $request->input('menuid');
        foreach ($menuid as $id) {
            DB::table('packet_has_menus')->insert([
            ['packet_id' => $packet_id, 'menu_id' => $id]
        ]);
        }

        return redirect('/viewpacketmenu')->with('success', 'Edit packet menu success');
        
    }
}
