<?php

use App\Project;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //test data
        Project::create([
            'name'                    => 'test_project1',
            'description'             => 'test_description',
            'status'                  => 'test_status'
        ]);
    }
}
