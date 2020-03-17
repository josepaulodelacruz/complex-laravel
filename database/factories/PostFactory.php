<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\Person;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->text(7),
        'post' => $faker->sentence(5),
        'person_id' => factory(Person::class),
    ];
});
