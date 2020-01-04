<?php

use Illuminate\Database\Seeder;
use App\Project;
use Carbon\Carbon;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //project (id=1)
        Project::create([
            'name'                    => 'test_project1',
            'description'             => 'test_beschrijving1',
            'start_date'              =>  Carbon::parse('21-11-2019'),
            'end_date'                =>  Carbon::parse('05-01-2020'),
        ]);

        //project (id=2)
        Project::create([
            'name'                    => 'test_project2',
            'description'             => 'test_beschrijving2',
            'start_date'              =>  Carbon::parse('21-11-2020'),
            'end_date'                =>  Carbon::parse('05-01-2021'),
        ]);
    }
}
