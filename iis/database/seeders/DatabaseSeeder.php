<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Test User 2',
             'email' => 'test@test.com',
             'password' => 'password',
             'login' => 'login'
        ]);

        \App\Models\Event::create([
            'host_id' => 1,
            'name' => 'Event 1',
            'description' => 'Description of event 1',
            'created_at' => now(),
            'updated_at' => now(),
            'start_time' => '2023-10-20 15:30:00',
            'end_time' => '2023-10-21 15:30:00',
            'website' => 'www.google.com'
        ]);
    }
}
