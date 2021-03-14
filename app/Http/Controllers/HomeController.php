<?php

namespace teaco\Http\Controllers;

use teaco\Menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $menus = DB::table('menus')
                    ->join('types', 'menus.menu_type', '=', 'types.id')
                    ->whereNotNull('menus.menu_name')
                    ->select('types.type_name', DB::raw("SUM(menus.menu_stock) as stock"))
                    ->groupBy('types.type_name')
                    ->get();
        return view('Teaco_Home', compact('menus'));
    }
}
