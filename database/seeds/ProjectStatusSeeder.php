<?php

use Illuminate\Database\Seeder;
use App\ProjectStatus;

class ProjectStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectStatus::create([
            'name'         =>   'Open'
        ]);
        ProjectStatus::create([
            'name'         =>   'Aan de gang'
        ]);
        ProjectStatus::create([
            'name'         =>   'Gesloten'
        ]);
    }
}
