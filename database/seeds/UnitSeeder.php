<?php
use teaco\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
	    	['unit_name' => 'kg'],
	    	['unit_name' => 'gram'],
            ['unit_name' => 'pc'],
            ['unit_name' => 'set'],
            ['unit_name' => 'bottle'],
            ['unit_name' => 'gallon'],
            ['unit_name' => 'tail']
		]);
    }
}
