<?php

use Illuminate\Database\Seeder;
use App\UserRole;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRole::create([
            'name'         =>   'Opdrachtgever'
        ]);
        UserRole::create([
            'name'         =>   'Hoofdaannemer'
        ]);
        UserRole::create([
            'name'         =>   'Investeerder'
        ]);
        UserRole::create([
            'name'         =>   'Bouwdirectie'
        ]);
        UserRole::create([
            'name'         =>   'Uitvoerder'
        ]);
        UserRole::create([
            'name'         =>   'Onderaannemer'
        ]);
    }
}
