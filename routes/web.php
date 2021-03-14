<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/g', function () {
return view('templates.test');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::middleware('auth')->middleware('role:Admin')->group(function(){
	Route::get('/createaccount', 'UserController@getRegister')->name('fregister');
	Route::get('/viewaccount', 'UserController@getAccount')->name('vaccount');
	Route::post('/createaccount', 'UserController@postRegister')->name('cregister');
	Route::delete('/deleteaccount/{username}', 'UserController@deleteAccount')->name('daccount');
	Route::post('/updateaccount/{id}', 'UserController@getEditAccount')->name('eaccount');
	Route::patch('/updateaccount/{id}', 'UserController@updateAccount')->name('uaccount');

	Route::get('/createmenu', 'MenuController@indexMenu')->name('fmenu');
	Route::post('/createmenu', 'MenuController@createMenu')->name('cmenu');
	Route::delete('/deletemenu/{menu_id}', 'MenuController@deleteMenu')->name('dmenu');
	Route::post('/updatemenu/{menu_id}', 'MenuController@getEditMenu')->name('emenu');
	Route::patch('/updatemenu/{menu_id}', 'MenuController@updateMenu')->name('umenu');

	Route::get('/createpacket', 'PacketController@indexPacket')->name('fpacket');
	Route::post('/createpackett', 'PacketController@createPacket')->name('cpacket');
	Route::get('/viewpacket', 'PacketController@getPacket')->name('vpacket');
	Route::delete('/deletepacket/{packet_id}', 'PacketController@deletePacket')->name('dpackett');

	Route::get('/viewunit', 'UnitController@getUnit')->name('vunit');
	Route::get('/createunit', 'UnitController@indexUnit')->name('funit');
	Route::post('/createunitt', 'UnitController@createUnit')->name('cunit');
	Route::delete('/deleteunit/{id}', 'UnitController@deleteUnit')->name('dunit');
	Route::post('/updateunit/{id}', 'UnitController@getEditUnit')->name('eunit');
	Route::patch('/updateunit/{id}', 'UnitController@updateUnit')->name('uunit');

	Route::get('/viewtype', 'TypeController@getType')->name('vtype');
	Route::get('/createtype', 'TypeController@indexType')->name('ftype');
	Route::post('/createtypee', 'TypeController@createType')->name('ctype');
	Route::delete('/deletetype/{id}', 'TypeController@deleteType')->name('dtype');
	Route::post('/updatetype/{id}', 'TypeController@getEditType')->name('etype');
	Route::patch('/updatetype/{id}', 'TypeController@updateType')->name('utype');

	Route::get('/createbalance', 'BalanceController@indexBalance')->name('fbalance');
	Route::post('/createbalance', 'BalanceController@createBalance')->name('cbalance');
	Route::get('/viewbalance', 'BalanceController@getBalance')->name('vbalance');
});

Route::middleware('auth')->middleware('role:Admin|Kasir')->group(function(){
	Route::get('/createbalancee', 'BalanceController@getB');
	Route::get('/viewmenu', 'MenuController@getMenu')->name('vmenu');
	
	
	Route::get('/createpacketmenu', 'MenuController@indexPacketMenu')->name('fpacketmenu');
	Route::post('/createpacketmenu', 'MenuController@createPacketMenu')->name('cpacketmenu');
	Route::get('/viewpacketmenu', 'MenuController@getPacketMenu')->name('vpacketmenu');
	Route::delete('/deletepacketmenu/{packet_id}', 'MenuController@deletePacketMenu')->name('dpacket');
	Route::delete('/deletepackettmenu/{menu_id}/{packet_id}', 'MenuController@deleteMenuPacket')->name('dpacketm');
	Route::post('/updatepacketmenu/{packet_id}', 'MenuController@getEditMenuPacket')->name('epacketm');
	Route::patch('/updatepacketmenu/{packet_id}', 'MenuController@updateMenuPacket')->name('upacketm');

	

	Route::get('/createorder', 'OrderController@indexMenu')->name('forder');
	Route::get('/createorderrr/{menu_id}', 'OrderController@getPrice');
	Route::get('/createorde/{packet_id}', 'OrderController@getPacket');
	// Route::get('/createorderr/{menu_id}', 'OrderController@getPrice');
	Route::post('/createor', 'OrderController@createOrder')->name('cod');
	Route::get('/vieworder', 'OrderController@getOrder')->name('vod');

	Route::get('/createboard', 'BoardController@indexBoard')->name('fboard');
	Route::post('/createboardd', 'BoardController@createBoard')->name('cboard');
	Route::get('/viewboard', 'BoardController@getBoard')->name('vboard');
	Route::patch('/updateboard/{boardid}', 'BoardController@refreshBoard')->name('uboard');
	Route::delete('/deleteboard/{boardid}', 'BoardController@deleteBoard')->name('dboard');
});
	
