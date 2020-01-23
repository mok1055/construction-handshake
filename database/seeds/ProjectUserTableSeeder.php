<?php

use Illuminate\Database\Seeder;
use App\ProjectUser;

class ProjectUserTableSeeder extends Seeder
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
        ProjectUser::create([
            'user_id'                => 2,
            'project_id'             => 1
        ]);
        ProjectUser::create([
            'user_id'                => 3,
            'project_id'             => 1
        ]);
    }
}
