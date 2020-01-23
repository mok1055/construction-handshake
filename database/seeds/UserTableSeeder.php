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
        User::create([
            'first_name'            => 'Mohamed',
            'last_name'             => 'Kichouhi',
            'email'                 => 'mohamed.kichouhi@student.hu.nl',
            'password'              =>  Hash::make('test123'),
            'role_id'               =>  5
        ]);
        User::create([
            'first_name'            => 'Diesmer',
            'last_name'             => 'Hensbergen',
            'email'                 => 'diesmer.hensbergen@student.hu.nl',
            'password'              =>  Hash::make('test1234'),
            'role_id'               =>  2
        ]);
        User::create([
            'first_name'            => 'Youri',
            'last_name'             => 'Van Maanen',
            'email'                 => 'youri-vanmaanen@student.hu.nl',
            'password'              =>  Hash::make('test1234'),
            'role_id'               =>  1
        ]);
    }
}
