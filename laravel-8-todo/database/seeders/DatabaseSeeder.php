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

        // important , first call user seeder, then Todo seeder

        $this->call(UserSeeder::class);
        $this->call(TodoSeeder::class);
    }
}
