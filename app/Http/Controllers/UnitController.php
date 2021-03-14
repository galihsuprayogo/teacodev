<?php

namespace teaco\Http\Controllers;

use Illuminate\Http\Request;
use teaco\Http\Controllers\view;
use teaco\Unit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function indexUnit()
	{
		return View('admin.Admin_CreateUnit');
	}

    public function getUnit()
    {
    	$units = Unit::paginate(10);

    	return View('admin.Admin_ViewUnit', compact('units'));
    }

    public function createUnit(Request $request)
    {
    	Unit::create([
    		'unit_name' => $request->unitname,
    	]);

    	return redirect('/viewunit')->with('success', 'create new unit success');
    }

    public function deleteUnit($id)
    {

    	Unit::find($id)->delete();

    	return redirect('/viewunit')->with('success', 'delete unit success');
    }

    public function getEditUnit($id)
    {
    	$units = DB::table('units')
    			->where('id', $id)	
    			->get();

		return View('admin.Admin_EditUnit', compact('units'));    	
    }

    public function updateUnit(Request $request, $id)
    {
    	Unit::find($id)->update([
    		'unit_name' => $request->unitname,
    	]);

    	return redirect('/viewunit')->with('success', 'update unit success');
    }
}
