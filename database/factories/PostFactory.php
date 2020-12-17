<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        //Faking data for anime posts
        'name' => $faker->firstName(),
        'genre' => $faker->randomElement(['Shounen', 'Sports', 'Parody', 'Slice of Life', 'Sci-Fi', 'Comedy']),
        'episodes' => $faker->numberBetween(12, 400),
        'released' => $faker->numberBetween(1990, 2020),
        'status' => $faker->randomElement(['completed', 'on-hold', 'ongoing', 'cancelled']),
        'user_id' => App\User::inRandomOrder() -> first() -> id,
    ];
});
