<?php

use Illuminate\Database\Seeder;
use teaco\Balance;
use Carbon\Carbon;

class BalanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dateNow = Carbon::now('Asia/Jakarta');
        $dateNowFormat = $dateNow->format('mdYHis');
        $bfulldate = $dateNow->format('m/d/Y H:i:s');

        $bdate = substr($bfulldate, 0,10);
    	$btime = substr($bfulldate, 11,8);

    	Balance::create([
    		'balance_date' => $bdate,
    		'balance_time' => $btime,
    		'balance' => 100000,
    	]);
    }
}
