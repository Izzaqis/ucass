<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $post = [
                [
                    'name'=>'Running Club',
                    'title'=>'Running Tips',
                    'type'=> 'All students',
                    'description'=>'Running Tips',
                ],
                [
                    'name'=>'Swimming Club',
                    'title'=>'Swimming Tips',
                    'type'=> 'All Students',
                    'description'=>'Swimming Tips',
                ],
                [
                    'name'=>'Swimming Club',
                    'title'=>'Swimming Tips',
                    'type'=> 'Club Members',
                    'description'=>'Swimming Tips',
                ],
            ];

            foreach ($post as $key => $value) {
            Post::create($value);
        }
    }
}
