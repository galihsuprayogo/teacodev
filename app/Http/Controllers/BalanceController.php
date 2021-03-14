<?php

namespace teaco\Http\Controllers;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use teaco\Http\Controllers\view;
use Carbon\Carbon;
use teaco\Balance;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BalanceController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function indexBalance()
    {
    	$dateNow = Carbon::now('Asia/Jakarta');
        $dateNowFormat = $dateNow->format('mdYHis');
        $bdate = $dateNow->format('m/d/Y H:i:s');

    	return View('admin.Admin_CreateBalance')->with('bdate', $bdate);
    }

    public function createBalance(Request $request)
    {
    	$bfulldate = $request->input('balancedate');
    	$mi = $request->input('moneyin');
    	$mo = $request->input('moneyout');

    	$bdate = substr($bfulldate, 0,10);
    	$btime = substr($bfulldate, 11,8);
    	
    	$b = Balance::all()->max('id');
    	$bal = Balance::where('id', $b)->get(['balance']); 	
        $plucked = $bal->pluck('balance');    
        $balint = implode($plucked->all());

    	if($mo == 0 && $mi == 0){
    		return redirect()->back()->with('danger', 'Nothing Happen');
    	}else if($mo == 0 && $mi > 0){
    		$totbal = $balint + $mi;
    			Balance::create([
            		'balance_date' => $bdate,
            		'balance_time' => $btime,
            		'balance' => $totbal,
            		'money_in' => $mi,
        		]);
        	return redirect()->back()->with('success', 'Balance Success Increment');
    	}else if($mo > 0 && $mi == 0){
    		if($mo <= $balint){
    		$totbal = $balint - $mo;
    		Balance::create([
            		'balance_date' => $bdate,
            		'balance_time' => $btime,
            		'balance' => $totbal,
            		'money_out' => $mo,
        		]);
        	return redirect()->back()->with('success', 'Balance Success Decrement');
    		}else if($mo > $balint){
    		return redirect()->back()->with('danger', 'Not enough Balance');
    		}
    	}else if($mo > 0 && $mi > 0){
    		$totbal = $balint + $mi;
    		$minew = Balance::create([
            		'balance_date' => $bdate,
            		'balance_time' => $btime,
            		'balance' => $totbal,
            		'money_in' => $mi,
        		]);
    				if($minew){
    					$bc = Balance::all()->max('id');
				    	$balc = Balance::where('id', $bc)->get(['balance']); 	
				        $plucked = $balc->pluck('balance');    
				        $balintn = implode($plucked->all());
    					if($mo <= $balintn){
    						$totbaln = $balintn - $mo;
    						Balance::create([
		            		'balance_date' => $bdate,
		            		'balance_time' => $btime,
		            		'balance' => $totbaln,
		            		'money_out' => $mo,
		        		]);
        					return redirect()->back()->with('success', 'Balance Success Increment & Decrement');
    					}else if($mo > $balintn){
    						return redirect()->back()->with('danger', 'Not Enough Balance');
    					}
    				} else{
    					return redirect()->back()->with('danger', 'Failed Input');
    				}
    	} else {
    		return redirect()->back()->with('danger', 'Wrong Input');
    	}

    }

    public function getBalance()
    {
    	$balances = Balance::paginate(10);
    	return View('admin.Admin_ViewBalance')->with('balances', $balances);
    }

    public function getB()
    {
    	$bc = Balance::all()->max('id');
		$balc = Balance::where('id', $bc)->get(['balance']);
    	return response()->json($balc);
    }
}
