<?php

namespace Database\Seeders;

use App\Data\Models\Auth\User;
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
        /**
         * Seed Users.
         */
         User::factory(10)->create();
    }
}
