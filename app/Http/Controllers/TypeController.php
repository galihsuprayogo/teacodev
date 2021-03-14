<?php

namespace teaco\Http\Controllers;

use Illuminate\Http\Request;
use teaco\Http\Controllers\view;
use teaco\Type;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function indexType()
	{
		return View('admin.Admin_CreateType');
	}

    public function getType()
    {
    	$types = Type::paginate(10);

    	return View('admin.Admin_ViewType', compact('types'));
    }

    public function createType(Request $request)
    {
    	Type::create([
    		'type_name' => $request->typename,
    	]);

    	return redirect('/viewtype')->with('success', 'create new type success');
    }

    public function deleteType($id)
    {

    	Type::find($id)->delete();

    	return redirect('/viewtype')->with('success', 'delete type success');
    }

    public function getEditType($id)
    {
    	$types = DB::table('types')
    			->where('id', $id)	
    			->get();

		return View('admin.Admin_EditType', compact('types'));    	
    }

    public function updateType(Request $request, $id)
    {
    	Type::find($id)->update([
    		'type_name' => $request->typename,
    	]);

    	return redirect('/viewtype')->with('success', 'update type success');
    }
}
