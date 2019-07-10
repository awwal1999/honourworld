<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Meeting;
use Faker\Generator as Faker;

$factory->define(Meeting::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5),
        'description' => $faker->paragraph(5),
        'venue' => $faker->address,
        'photo' => $faker->imageUrl($width = 640, $height = 480),
        'date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+1 month'),
    ];
});
