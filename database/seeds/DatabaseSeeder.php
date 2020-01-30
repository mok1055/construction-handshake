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
        $this->call(UserRoleSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ProjectStatusSeeder::class);
        $this->call(ProjectTableSeeder::class);
        $this->call(ProjectUserTableSeeder::class);
        $this->call(PaymentSeeder::class);
    }
}
