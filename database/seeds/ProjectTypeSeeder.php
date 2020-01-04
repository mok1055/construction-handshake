<?php

use Illuminate\Database\Seeder;
use App\ProjectType;

class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectType::create([
            'name'         =>   'test_type_1'
        ]);
        ProjectType::create([
            'name'         =>   'test_type_2'
        ]);
    }
}
