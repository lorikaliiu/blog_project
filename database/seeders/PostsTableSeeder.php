<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory()->create([
            'user_id' => 1, 
            'cat_id' => 1, 
            'title' => 'Post 1',
            'thumb' => 'thumb1.jpg',
            'full_img' => 'post1.jpg',
            'detail' => 'Lorem ipsum dolor sit amet',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        }
    }

