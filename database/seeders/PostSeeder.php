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
                    'description'=>'Running Tips',
                ],
                [
                    'name'=>'Running Club',
                    'title'=>'Running Tips',
                    'description'=>'Running Tips',
                ],
                [
                    'name'=>'Swimming Club',
                    'title'=>'Swimming Tips',
                    'description'=>'Swimming Tips',
                ],
            ];

            foreach ($post as $key => $value) {
            Post::create($value);
        }
    }
}
