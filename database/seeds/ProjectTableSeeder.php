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
        //Project (id=1)
        Project::create([
            'name'        => 'Sanering tankstation',
            'description' => 'Dit project gaat over de sanering van het tankstation in eindhoven',
            'start_date'  => Carbon::parse('23-11-2019'),
            'end_date'    => Carbon::parse('15-03-2020'),
        ]);

        //Project (id=2)
        Project::create([
            'name'        => 'Aanbouw Ah supermarkt',
            'description' => 'Dit project gaat over uitbreiding van de Albert hein in Breda',
            'start_date'  => Carbon::parse('01-11-2019'),
            'end_date'    => Carbon::parse('25-04-2020'),
        ]);

        //Project (id=3)
        Project::create([
            'name'        => 'Voegwerk Westerkerk',
            'description' => 'Dit project gaat over het voegwerk van de westerkerk te Amsterdam',
            'start_date'  => Carbon::parse('10-10-2019'),
            'end_date'    => Carbon::parse('08-05-2020'),
        ]);

        //Project (id=4)
        Project::create([
            'name'        => 'Herstel brandschade ING-Bank',
            'description' => 'Dit project gaat over herstel werkzaamheden bij ING-Bank in Assen',
            'start_date'  => Carbon::parse('01-02-2020'),
            'end_date'    => Carbon::parse('25-04-2020'),
        ]);

        //Project (id=5)
        Project::create([
            'name'        => 'Stucwerk project',
            'description' => 'Dit project gaat over stucwerk in Woerden',
            'start_date'  => Carbon::parse('01-03-2020'),
            'end_date'    => Carbon::parse('25-06-2020'),
        ]);
    }
}
