<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make('admin'),
        'role' => rand(1,3)==1 ? 'visitor' : (rand(1,3) ==3? 'administrator' : 'subscribe'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Post::class, function (Faker\Generator $faker) {

    return [
        'user_id' => rand(1,15),
        'category_id' => rand(1,2),
        'title' => "TITRE",
        'published_at' => $faker->datetime(),
        'content' => $faker->paragraph(),

    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    
    return [
        'user_id' => rand(1,15),
        'post_id' => rand(1,15),
        'published_at' => $faker->datetime(),
        'content' => $faker->paragraph(),
    ];
});

$factory->define(App\Tag::class, function (Faker\Generator $faker) {
    
    return [
        'name' => $faker->name,
    ];
});