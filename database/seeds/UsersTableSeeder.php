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
            'name'             => 'Mohamed Kichouhi',
            'email'            => 'mohamed.kichouhi@student.hu.nl',
            'password'         => Hash::make('test123'),
            'remember_token'   => Str::random(10),
        ]);
    }
}
