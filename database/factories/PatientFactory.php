<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */


use App\Models\Doctor, App\Models\City, App\Models\Patient;
use Faker\Generator as Faker;

$factory->define(Patient::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('123456'),
        'doctor_id' => Doctor::inRandomOrder()->value('id'),
        'city_id' => City::inRandomOrder()->value('id')
    ];
});
