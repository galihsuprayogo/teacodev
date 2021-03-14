<?php
use teaco\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        DB::table('types')->insert([
	    	['type_name' => 'vegetables'],
	    	['type_name' => 'fruits'],
            ['type_name' => 'snack'],
            ['type_name' => 'soda']
		]);
    }
}
