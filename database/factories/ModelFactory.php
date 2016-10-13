<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Notebook::class, function (Faker\Generator $faker) {
    $name = $faker->realText(20);
    $slug = str_slug($name, '-');

    return [
    	'name' => $name,
    	'slug' => $slug,
    	'description' => $faker->paragraph(3),
    	'color' => $faker->hexcolor
    ];
});

$factory->define(App\Note::class, function (Faker\Generator $faker) {
    $title = $faker->realText(40);
    $slug = str_slug($title, '-');

    return [
        'title' => $title,
        'slug' => $slug,
        'content' => $faker->paragraphs(3, true),
        'color' => $faker->hexcolor
    ];
});
