<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use Database\Factories\PostFactory;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Category;
use Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Phone Khaing Hein',
            'email' => 'pkh2662003@gmail.com',
        ]);

        User::factory(10)->create();

        $categories = ["Sport", "News", "Lifestyle", "Celebrity", "Food", "Health"];

        forEach($categories as $category){
            Category::factory()->create([
                "title"=>$category,
                "slug"=>Str::slug($category),
                "user_id"=>User::inRandomOrder()->first()->id
            ]);
        }

        Post::factory(50)->create();

    }
}
