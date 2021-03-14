<?php

namespace teaco\Http\Controllers;
use teaco\User;
use teaco\Role;
use teaco\Http\Controllers\view;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
	 public function __construct()
    {
      $this->middleware('auth');
    }

     public function getRegister()
    {
    	$roles = Role::all();

        return View('admin.Admin_CreateAccount', compact('roles'));
    }
     
    public function postRegister(Request $request)
    {
    	$user = User::create([
    			'fullname' => request('fullname'),
    			'username' => request('username'),
    			'password' => bcrypt(request('password'))
    		]);

    	if ($request->get('roles')=='Admin') {
    		$user->assignRole('Admin');

    	}else{
    		$user->assignRole('Kasir');
    	}
        
       return redirect('/viewaccount')->with('success', 'create new account success');
    }
    public function getAccount()
    {
        $result = DB::table('users')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select('users.fullname','users.username', 'users.id','roles.name')
            ->get();

        return view ('admin.Admin_ViewAccount' , ['result' => $result]);
    }
    public function deleteAccount($id)
    {
        $user = User::find($id);
        $user->delete();
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        return redirect('/viewaccount')->with('success','delete account success');
    }
    public function getEditAccount($id)
    {

        $result = DB::table('users')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select('users.fullname','users.username', 'users.id','roles.name')
            ->where('users.id', '=', $id)->get();
        $roles = Role::all();

        return view ('admin.Admin_EditAccount' , ['result' => $result], ['roles' => $roles]);
    }

    public function updateAccount(Request $request, $id)
    {
            $user = User::find($id);
            $user->update([
                'fullname' => request('fullname'),
            ]);

            $newrole = $request->input('roles');
            DB::table('model_has_roles')->where('model_id', $id)->update(['role_id' => $newrole]);   
            return redirect('/viewaccount')->with('success', 'update account success');
    }
}
