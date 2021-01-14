<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => ucfirst($this->faker->unique()->words(3, true)),
        'price' => $this->faker->unique()->randomFloat(2, 0, 100)
    ];
});
