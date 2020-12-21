<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Tag;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Some fake data as example
        $AniPost = new Post;
        $AnimeTag = Tag::where('tags', 'cool')->first();

        $AniPost -> name = "Naruto";
        $AniPost -> genre = "Shounen";
        $AniPost -> episodes = "250";
        $AniPost -> released = 2002;
        $AniPost -> status = 'completed';
        $AniPost -> user_id = rand(1,7);
        $AniPost -> save();
        $AniPost -> tags() -> attach($AnimeTag);

        //Use factory to generate 30 examples
        factory(App\Post::class, 30) -> create() -> each(function ($post) {
            $post -> save();
            $post -> tags() -> attach(rand(1,50));
            $post -> tags() -> attach(rand(51,100));
        });
    }
}
