<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'tags' => $faker->randomElement(['cool',
            'funny',
            'heartwarming',
            'crap',
            'overhyped',
            'underrated',
            'GOATed',
            'lame',
            'harem',
            'school',
            'highschool',
            'hero',
            'villain',
            'great watch',
            'boring',
            'interesting']),
    ];
});
