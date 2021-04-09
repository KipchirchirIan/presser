<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'post_title' => $faker->text(100),
		'post_content' => $faker->text,
		'post_status' => $faker->randomElement(['published', 'draft', 'scheduled']),
		'post_author' => function () {
    		return factory(\App\User::class)->create()->id;
		}
    ];
});
