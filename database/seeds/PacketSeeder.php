<?php
use teaco\Packet;
use Illuminate\Database\Seeder;

class PacketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packets')->insert([
	    	['packet_name' => 'Paket A'],
	    	['packet_name' => 'Paket B'],
            ['packet_name' => 'Paket C'],
            ['packet_name' => 'Paket Hemat Teaco']
		]);
    }
}
