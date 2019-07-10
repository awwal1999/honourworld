<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Agenda;
use Faker\Generator as Faker;

$factory->define(Agenda::class, function (Faker $faker) {
    return [
        'meeting_id' => $faker->numberBetween(1,30),
        'name' => $faker->sentence(5),
    ];
});
