<?php

use teaco\Board;
use Illuminate\Database\Seeder;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('boards')->insert([
	    	['board_id' => '01'],
	    	['board_id' => '02'],
            ['board_id' => '03'],
            ['board_id' => '04'],
            ['board_id' => '05'],
            ['board_id' => '06'],
            ['board_id' => '07'],
            ['board_id' => '08'],
            ['board_id' => '09'],
            ['board_id' => '10'],
            ['board_id' => '11'],
            ['board_id' => '12'],
            ['board_id' => '13'],
            ['board_id' => '14'],
            ['board_id' => '15'],
            ['board_id' => '16'],
            ['board_id' => '17'],
            ['board_id' => '18'],
            ['board_id' => '19'],
            ['board_id' => '20']
		]);
    }
}
