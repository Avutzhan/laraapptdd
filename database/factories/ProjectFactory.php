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

//php artisan make:factory ProjectFactory --model="App\Project"
//tinker
//factory('App\Project')->make()
//make не сохраняет в базе возвращает обьект
//create сохраняет в базе обьект
//raw массив
// App\Project::forceCreate(['title' => 'My project', 'description' => 'Lorem ipsum', 'owner_id' => 10]);
