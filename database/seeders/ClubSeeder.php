<?php

namespace Database\Seeders;

use App\Models\Club;
use Illuminate\Database\Seeder;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $club = [
                [
                    'name'=>'Running Club',
                    'date'=>'5/2/2010',
                    'category'=>'Sport & Recretional',
                    'zone' => 'College',
                    'advisor' => 'Puan Naziffa Raha',
                ],
                [
                    'name'=>'Netball Club',
                    'date'=>'2/7/2010',
                    'category'=>'Sport & Recretional',
                    'zone' => 'College',
                    'advisor' => 'Puan Zailani',
                ],
                [
                    'name'=>'Swimming Club',
                    'date'=>'1/2/2010',
                    'category'=>'Sport & Recretional',
                    'zone' => 'College',
                    'advisor' => 'Encik Azlan',
                ],
            ];

            foreach ($club as $key => $value) {
                Club::create($value);
        }
    }
}
