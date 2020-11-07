<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // creazione della factory (database con dati di comodo per testare applicazionme)

        factory(App\User::class, 51)->create();  // booh
      // $this->call(UsersTableSeeder::class);

       //    \App\Models\User::factory(10)->create();
    }

}
