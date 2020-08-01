<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'owner_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});

//php artisan make:factory ProjectFactory --model="App\Project"
//tinker
//factory('App\Project')->make()
//make не сохраняет в базе возвращает обьект
//create сохраняет в базе обьект
//raw массив
// App\Project::forceCreate(['title' => 'My project', 'description' => 'Lorem ipsum', 'owner_id' => 10]);
