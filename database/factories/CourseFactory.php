<?php

use Faker\Generator as Faker;

$factory->define(App\Course::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3),
        'description' => $faker->text(),
        'price' => $faker->randomFloat(2),
        'minimum_students' => $faker->numberBetween(5, 20),
        'maximum_students' => $faker->numberBetween(21, 100),
        'hours' => $faker->numberBetween(50, 100),
        'course_type_id' => factory(App\Category::class)->create(['type' => 'course_type'])->id,
        'modality_id' => factory(App\Category::class)->create(['type' => 'modality'])->id,
        'shift_id' => factory(App\Category::class)->create(['type' => 'shift'])->id,
        'occupation_area_id' => factory(App\Category::class)->create(['type' => 'occupation_area'])->id,
        'target_audience_id' => factory(App\Category::class)->create(['type' => 'target_audience'])->id,
    ];
});
