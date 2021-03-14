<?php

namespace teaco\Http\Controllers;

use Illuminate\Http\Request;
use teaco\Http\Controllers\view;
use teaco\Board;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BoardController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('boardm');
	}

	public function indexBoard()
	{
		$bid = Board::all()->max('board_id');
		$bidsub = (int) substr($bid, 0,2);
		$bidin = $bidsub + 1;
		$bidn = sprintf("%02s", $bidin);
		
		return View('user.User_CreateBoard')->with('boardid', $bidn);
	}

   	public function getBoard()
   	{
   		$boards = Board::paginate(10);
         $b = Board::all()->max('board_id');
         $bmax =  Board::where('board_id', $b)->get(['board_id']);
         $plucked = $bmax->pluck('board_id');    
         $bmaxint = implode($plucked->all());

   		return View('user.User_ViewBoard')->with('boards', $boards)->with('bmax', $bmaxint);
   	}

   	public function refreshBoard($boardid)
   	{
   		
   		DB::table('boards')->where('board_id', $boardid)
            ->update(['board_status' => null]);

        return redirect('/viewboard')->with('success', 'update board status success');
   	}

   	public function deleteBoard($boardid)
   	{
   		DB::table('boards')->where('board_id', $boardid)->delete();

   		return redirect('/viewboard')->with('success', 'delete board success');
   	}

   	public function createBoard(Request $request)
   	{
   		Board::create([
   			'board_id' => $request->boardid,
   		]);	

   		return redirect('/viewboard')->with('success', 'create new board success');
   	}
}
