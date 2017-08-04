<?php

use App\Models\Category;

$factory->define(Category::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->unique()->name,
    ];
});
