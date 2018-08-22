<?php

use Faker\Generator as Faker;

$factory->define(App\Lesson::class, function (Faker $faker) {
    return [
        'date' => $faker->date(),
        'start_time' => $faker->time(),
        'end_time' => $faker->time()
    ];
});
