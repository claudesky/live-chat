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
        // Default test user
        User::create([
            'email' => 'test@example.org',
            'name' => 'John Doe',
            'password' => bcrypt('password'),
        ]);

        // Other users
        User::factory(10)->create();
    }
}
