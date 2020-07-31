<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph
    ];
});

//php artisan make:factory ProjectFactory --model="App\Project"
//tinker
//factory('App\Project')->make()
//make не сохраняет в базе возвращает обьект
//create сохраняет в базе обьект
//raw массив
