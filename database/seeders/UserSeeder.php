<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = [
            [
                'name'=>'Admin',
                'mobile'=>'0123456789',
                'email'=>'a@admin.com',
                'address' => 'No.2, Taman Bunga',
                'city' => 'Rembau',
                'poscode' => '71300',
                'is_admin'=>'1',
                'is_commitee'=>'0',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Commitee',
                'mobile'=>'0123456789',
                'email'=>'b@committee.com',
                'address' => 'No.2, Taman Bunga',
                'city' => 'Rembau',
                'poscode' => '71300',
                'is_admin'=>'0',
                'is_commitee'=>'1',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Student',
                'mobile'=>'0123456789',
                'email'=>'sw0106960@uniten.student.edu.com',
                'address' => 'No.2, Taman Bunga',
                'city' => 'Rembau',
                'poscode' => '71300',
                'is_admin'=>'0',
                'is_commitee'=>'0',
                'password'=> bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
