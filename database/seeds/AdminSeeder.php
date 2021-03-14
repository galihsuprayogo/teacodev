<?php

use teaco\User;
use Illuminate\Database\Seeder;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'fullname' => 'Master Admin',
        	'username' => 'Master',
        	'password' => bcrypt(666666)
        ]);

        $user->assignRole('Admin');
    }
}
