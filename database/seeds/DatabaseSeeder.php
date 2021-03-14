<?php
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolePermissionSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(PacketSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(BalanceSeeder::class);
        $this->call(BoardSeeder::class);
    }
}
