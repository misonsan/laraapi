<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

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

//             da github



/*

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'password' => Hash::make('moreno01'), // password
        'remember_token' => Str::random(10),
        'phone'=> $faker->phoneNumber,
        'province' =>$faker->city,
        'fiscalcode'=>$faker->text(16),
        'age' => $faker->numberBetween(18,120),
        'lastname'=> $faker->lastName
    ];
});

*/




//   originale

class UserFactory extends Factory
{
   //
    // The name of the factory's corresponding model.
    //
    // @var string
    //
    protected $model = \App\Models\User::class;

    //
    // Define the model's default state.
    //
    // @return array
    //
    public function definition()
    {
        return [

            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'password' => Hash::make('moreno01'), // password
            'remember_token' => Str::random(10),
            'phone'=> $this->faker->phoneNumber,
            'province' => $this->faker->city,
            'fiscalcode'=> $this->faker->text(16),
            'age' => $this->faker->numberBetween(18,120),
            'lastname'=> $this->faker->lastName

        ];
    }
}

