<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'body' => $faker->sentence,
        'project_id' => factory(App\Project::class)
    ];
});
//you can do this
//'project_id' => function () {
//    return factory(App\Project::class)->create()->id;
//}
