<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //user (id=1)
        User::create([
            'first_name'            => 'Mohamed',
            'last_name'             => 'Kichouhi',
            'email'                 => 'mohamed.kichouhi@student.hu.nl',
            'password'              =>  Hash::make('test123')
        ]);
        //user (id=2)
        User::create([
            'first_name'            => 'Diesmer',
            'last_name'             => 'Hensbergen',
            'email'                 => 'diesmer.hensbergen@student.hu.nl',
            'password'              =>  Hash::make('test1234')
        ]);
    }
}
