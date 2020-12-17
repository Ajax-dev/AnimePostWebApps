<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        //Use of faker to generate comments
        'text' => $faker -> realText($maxNbChars = (rand(40, 150))),
        'user_id' => App\User::inRandomOrder() -> first() -> id,
        'post_id' => App\Post::inRandomOrder() -> first() -> id,
    ];
});
