<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 10; $i++) {
            \App\Models\Post::create([
                'title' => 'Tin tức ' . $i,
                'image' => null,
                'category_id' => rand(1, 3),
                'view' => rand(100, 300),
                'content' => 'Nội dung ' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
