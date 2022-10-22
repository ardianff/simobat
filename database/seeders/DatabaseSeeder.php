<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Medicine;
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
        // seeding data faker
        \App\Models\User::factory(3)->create();

        \App\Models\User::factory()->create([
            'name' => 'Ardian Ferdy Firmansyah',
            'email' => 'ardianfirmansyah123@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('ardian123@'),
        ]);
        Medicine::factory(5)->create();
    }
}