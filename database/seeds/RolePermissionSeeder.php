<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//reset cached role & permissions
    	app()['cache']->forget('spatie.permission.cache');

    	//create permissions
    	Permission::create(['name' => 'create account']);
    	Permission::create(['name' => 'delete account']);
    	Permission::create(['name' => 'edit account']);
        Permission::create(['name' => 'view account']);

        Permission::create(['name' => 'create unit']);
    	Permission::create(['name' => 'delete unit']);
    	Permission::create(['name' => 'edit unit']);
        Permission::create(['name' => 'view unit']);

        Permission::create(['name' => 'create type']);
    	Permission::create(['name' => 'delete type']);
    	Permission::create(['name' => 'edit type']);
        Permission::create(['name' => 'view type']);

        Permission::create(['name' => 'create material']);
    	Permission::create(['name' => 'delete material']);
    	Permission::create(['name' => 'edit material']);
        Permission::create(['name' => 'view material']);

        Permission::create(['name' => 'create menu']);
    	Permission::create(['name' => 'delete menu']);
    	Permission::create(['name' => 'edit menu']);
        Permission::create(['name' => 'view menu']);

		Permission::create(['name' => 'create packet menu']);
    	Permission::create(['name' => 'delete packet menu']);
    	Permission::create(['name' => 'edit packet menu']);
        Permission::create(['name' => 'view packet menu']);
        Permission::create(['name' => 'delete menu packet']);

        Permission::create(['name' => 'create packet']);
        Permission::create(['name' => 'delete pakcet']);
        Permission::create(['name' => 'edit packet']);
        Permission::create(['name' => 'view packet']);

        Permission::create(['name' => 'create order']);
        Permission::create(['name' => 'view order']);

        Permission::create(['name' => 'create board']);
        Permission::create(['name' => 'delete board']);
        Permission::create(['name' => 'edit board']);
        Permission::create(['name' => 'view board']);

        Permission::create(['name' => 'create balance']);
        Permission::create(['name' => 'view balance']);

     	//create roles and assign permissions
        $admin = Role::create(['name' => 'Admin']);
        $admin->givePermissionTo(Permission::all());

        $kasir = Role::create(['name' => 'Kasir']);
        $kasir->givePermissionTo(['create order', 'view order', 'create board', 'view board', 'edit board', 'view menu', 'view packet menu']);  
    }
}


