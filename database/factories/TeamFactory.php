<?php

use Faker\Generator as Faker;

$factory->define(App\Team::class, function (Faker $faker) {
    return [
        'minimum_students' => $faker->numberBetween(5, 20),
        'maximum_students' => $faker->numberBetween(21, 100),
        'course_id' => factory(App\Course::class)->create()->id,
    ];
});
