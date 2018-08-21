<?php

use Faker\Generator as Faker;

$factory->define(App\Course::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3),
        'description' => $faker->text(),
        'price' => $faker->randomFloat(2),
        'hours' => $faker->numberBetween(50, 100),
        'course_type_id' => factory(App\Category::class)->create(['type' => 'course_type'])->id,
        'modality_id' => factory(App\Category::class)->create(['type' => 'modality'])->id,
        'occupation_area_id' => factory(App\Category::class)->create(['type' => 'occupation_area'])->id,
        'target_audience_id' => factory(App\Category::class)->create(['type' => 'target_audience'])->id,
    ];
});
