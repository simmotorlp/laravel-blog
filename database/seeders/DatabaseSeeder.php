<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(20)->create();
        Tag::factory(10)->create();

        $tagIds = Tag::pluck('id')->toArray();
        $categoryIds = Category::pluck('id')->toArray();

        $posts = Post::factory(50)->make()->each(function ($post) use ($categoryIds) {
            $post->category_id = array_rand($categoryIds);
        })->toArray();
        Post::insert($posts);

        $postIds = Post::pluck('id')->toArray();
        $post_tags = [];
        for ($i = 0; $i < 30; $i++) {
            $post_tag['tag_id'] = array_rand($tagIds);
            $post_tag['post_id'] = array_rand($postIds);
            $post_tags[] = $post_tag;
        }
        DB::table('post_tag')->insert($post_tags);
    }
}
