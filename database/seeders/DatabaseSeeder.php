<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Author;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Schema::disableForeignKeyConstraints();
        User::truncate();
        Author::truncate();
        Category::truncate();
        Post::truncate();
        Comment::truncate();
        Tag::truncate();
        PostTag::truncate();


        for($i = 0; $i< 10 ; $i++){
            User::create([
                'name'=>fake()->name(),
                'email' => fake()->email(),
                'password' => bcrypt('123456'),
            ]);
        }

        for($i = 1; $i< 11 ; $i++){
            Author::create([
                'user_id' => rand(1,10),
                'name'=>fake()->name(),
            ]);
        }

        for($i = 0; $i< 10 ; $i++){
            Category::create([
                'name'=>fake()->name(),
            ]);
        }

        for($i = 0; $i< 10 ; $i++){
            Post::create([
                'title'=>fake()->title(),
                'image' => fake()->image(),
                'short_description' => fake()->text(100),
                'content' => fake()->text(255),
                'author_id' => rand(1,10),
                'category_id' => rand(1,10),

            ]);
        }

        for($i =1 ; $i< 11 ; $i++) {
            Comment::create([
                'content'=> fake()->text(100),
                'post_id' => rand(1,10),
                'user_id' => rand(1,10),
            ]);
        }

        for($i = 0; $i< 10 ; $i++){
            Tag::create([
                'name'=>fake()->text(5),
            ]);
        }

        for ($i = 1; $i <= 10; $i++) {
            $post_id = rand(1, 10);
            $tag_id= rand(1, 10);

            // Sử dụng firstOrCreate để tránh trùng lặp
            PostTag::firstOrCreate(
                ['post_id' => $post_id, 'tag_id' => $tag_id],
                ['post_id' => $post_id, 'tag_id' => $tag_id]
            );
        }
    }
}
