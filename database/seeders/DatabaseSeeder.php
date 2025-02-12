<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //Seed rồi
        // User::create([
        //     'firstname' => 'John',
        //     'lastname' => 'Doe',
        //     'avatar' => 'https://example.com/avatar.jpg', // Hình ảnh mẫu
        //     'email' => 'john.doe@example.com',
        //     'email_verified_at' => now(),
        //     'password' => bcrypt('password123'),
        //     'utype' => 'ADM',
        // ]);
        // User::create([
        //     'firstname' => 'Mary',
        //     'lastname' => 'Jean',
        //     'avatar' => 'https://example.com/avatar.jpg', // Hình ảnh mẫu
        //     'email' => 'mary@example.com',
        //     'email_verified_at' => now(),
        //     'password' => bcrypt('password123'),
        //     'utype' => 'USR',
        // ]);

        // User::factory(10)->create();
    }
}
