<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //test data
        User::create([
            'first_name'            => 'Mohamed',
            'last_name'             => 'Kichouhi',
            'email'                 => 'mohamed.kichouhi@student.hu.nl',
            'password'              =>  Hash::make('test123')
        ]);
    }
}
