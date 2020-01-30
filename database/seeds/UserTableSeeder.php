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
            'role_id'               =>  5,
            'wallet'                => '0xBB9bc244D798123fDe783fCc1C72d3Bb8C189413'
        ]);
        User::create([
            'first_name'            => 'Diesmer',
            'last_name'             => 'Hensbergen',
            'email'                 => 'diesmer.hensbergen@student.hu.nl',
            'password'              =>  Hash::make('test1234'),
            'role_id'               =>  2,
            'wallet'                => '0xeafa188ac12e331b52e585ea6298f8138e23c0e6'
        ]);
        User::create([
            'first_name'            => 'Youri',
            'last_name'             => 'Van Maanen',
            'email'                 => 'youri-vanmaanen@student.hu.nl',
            'password'              =>  Hash::make('test1234'),
            'role_id'               =>  1,
            'wallet'                =>  'test'
        ]);
    }
}
