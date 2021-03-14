<?php

use Illuminate\Database\Seeder;
use teaco\Order;
use Carbon\Carbon;


class OrderSeeder extends Seeder
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
        $kode = "0000000001";
        $oid = "T". $dateNowFormat. $kode;

        Order::create([
        	'order_id' => $oid,
        ]);
    }
}
