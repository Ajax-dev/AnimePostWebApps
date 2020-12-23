<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Some fake data as example
        $AniTag = new Tag;

        $AniTag -> tags = "cool";
        $AniTag -> save();

        //Use factory to generate 100 examples
        factory(App\Tag::class, 30) -> create();
    }
}
