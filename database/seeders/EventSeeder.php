<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
        public function run()
        {
            $event = [
                [
                    'name'=>'Swimming Club',
                    'date'=>'2021-02-15',
                    'eventname'=>'Swimming Tips',
                    'eventime'=>'2pm - 3pm',
                    'type'=> 'All students',
                    'category'=>'Sport & Recreational',
                    'level'=>'College',
                    'organizer'=>'Swimming Club',
                    'location'=>'Microsoft Teams',
                    'link'=>'https://teams.microsoft.com/dl/launcher/d4%847',
                    'fundcash'=>'None',
                    'fundtransport'=>'None',
                    'description'=>'Lets Improve your swimming skills!',
                    'note'=>'None',
                    'poster'=>'None',
                ],
                [
                    'name'=>'Running Club',
                    'date'=>'2021-02-20',
                    'eventname'=>'Running Tips',
                    'eventime'=>'10am - 12pm',
                    'type'=> 'Club Members',
                    'category'=>'Sport & Recreational',
                    'level'=>'College',
                    'organizer'=>'Running Club',
                    'location'=>'Microsoft Teams',
                    'link'=>'https://teams.microsoft.com/dl/launcher/d4%847',
                    'fundcash'=>'None',
                    'fundtransport'=>'None',
                    'description'=>'Lets Improve your running skills!',
                    'note'=>'None',
                    'poster'=>'None',
                ],
            ];

            foreach ($event as $key => $value) {
            Event::create($value);
        }
    }
}
