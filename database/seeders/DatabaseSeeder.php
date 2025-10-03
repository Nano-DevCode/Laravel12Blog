<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Manuel Eduardo',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789'),
        ]);

        Category::factory(10)->create();
        Post::factory(100)->create();
        Tag::factory(10)->create();
    }
}
