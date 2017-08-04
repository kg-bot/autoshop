<?php

use App\Models\Vehicle;

$factory->define(Vehicle::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'category' => 'BMW',
        'price' => rand(1000, 40000),
        'year' => rand(1998, 2017),
        'kilometers' => rand(90000, 500000),
        'approved' => 1,
        'image_path' => 'http://example.com/example.jpg',
        // Default should be admin ID
        'added_by' => 2,
    ];
});
