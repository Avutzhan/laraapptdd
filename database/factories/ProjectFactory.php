<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => str_limit($faker->paragraph, 50),
        'notes' => 'foo bar',
        'owner_id' => factory(App\User::class)

    ];
});
