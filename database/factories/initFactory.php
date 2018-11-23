<?php

use Faker\Generator as Faker;

$factory->define(App\init::class, function (Faker $faker) {

    $authID = $faker->numberBetween(1000000000000000, 9999999999999999);
    $x = $faker->numberBetween(0, 250);
    $y = $faker->numberBetween(0, 150);

    return [
        'authID' => $authID,
        'x' => $x,
        'y' => $y,
    ];
});
