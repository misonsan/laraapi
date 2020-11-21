<?php

 namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;




class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.    -------   funziona
     *
     * @return void
     */
    public function run()
    {

        User::factory()->times(2)->create();

    }
}
