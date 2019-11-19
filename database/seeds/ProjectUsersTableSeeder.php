<?php

use App\ProjectUser;
use Illuminate\Database\Seeder;

class ProjectUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //test data
        ProjectUser::create([
            'user_id'                => 1,
            'project_id'             => 1
        ]);
    }
}
