<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'めるぴっと太郎',
            'email' => 'test@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
        ]);;

    }
}
