<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Admin;
use App\Student;
use App\Teacher;
use App\Olympiad;
use App\File;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Student::class, function (Faker $faker) {
    return [
        'username' => $faker->unique()->userName,
        'firstname' => $faker->firstname,
        'lastname' => $faker->lastname,
        'status' => 'active',
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Teacher::class, function (Faker $faker) {
    return [
        'username' => $faker->unique()->userName,
        'firstname' => $faker->firstname,
        'lastname' => $faker->lastname,
        'status' => 'active',
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Admin::class, function (Faker $faker) {
    return [
        'username' => $faker->unique()->userName,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Olympiad::class, function (Faker $faker) {

    $work = File::create([
        'path' => '12345'
    ]);

    return [
        'name' => $faker->name,
        'subject_id' => 1,
        'teacher_id' => 1,
        'work_id' => $work->id,
        'cost' => 0,
        'start_date' => '2020-03-28 09:00',
        'end_date' => '2020-03-28 20:00',
        'description' => $faker->text,
        'duration' => '01:00',
        'status' => Olympiad::STATUS_MODERATION
    ];
});
