<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => "Administrador",
            'username' => "admin",
            'password' => '$2y$10$79lFQuJfbngvyHBnNGszVeS1TDJq/RqgM2Y0wFvax/i113v2aBsAu', // admin
            'rol' => 'Administrador' ]);

        User::create([
            'name' => "Secretaría",
            'username' => "secretaria",
            'password' => '$2y$10$79lFQuJfbngvyHBnNGszVeS1TDJq/RqgM2Y0wFvax/i113v2aBsAu', // admin
            'rol' => 'Secretaria' ]);
    }
}
