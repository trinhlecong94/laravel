<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

$factory->define(App\Models\Account::class, function (Faker $faker) {
    return [
        'address' => $faker->address,
        'birthday' => $faker->dateTimeBetween('1990-01-01', '2012-12-31')->format('Y-m-d'),
        'email' => $faker->unique()->safeEmail,
        'full_name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'status' => Str::random(10),
        'username' => $faker->username,
        'password' => Hash::make('password'),
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ];
});
