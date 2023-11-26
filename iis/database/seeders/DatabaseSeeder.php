<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        DB::table('roles')->insert([
            ['name' => 'registered_user'],
            ['name' => 'moderator'],
            ['name' => 'administrator']
        ]);

        \App\Models\User::factory()->create([
                'name' => 'Meno Priezvisko',
                'email' => 'valkvoskasimona@gmail.com',
                'password' => 'password',
                'login' => 'meno',
                'created_at' => now(),
                'updated_at' => now(),
                'role_id' => 1
        ]);

        \App\Models\User::factory()->create([
                'name' => 'Moderator',
                'email' => 'valkovskasimona@gmail.com',
                'password' => 'password',
                'login' => 'moderator',
                'created_at' => now(),
                'updated_at' => now(),
                'role_id' => 2
        ]);

        \App\Models\User::factory()->create([
                'name' => 'Admin admin',
                'email' => 'xvalko12@vutbr.cz',
                'password' => 'password',
                'login' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
                'role_id' => 3
        ]);

        \App\Models\Category::create([
            'name' => 'Entertainment'
        ]);

        \App\Models\Category::create([
            'name' => 'Music',
            'parent_id' => 1,
            'approved' => true
        ]);

        \App\Models\Category::create([
            'name' => 'Movies',
            'parent_id' => 1,
            'approved' => false
        ]);

        \App\Models\Venue::create([
                'name' => 'Venue 1',
                'description' => 'description of venue 1',
                'street' => 'ulica',
                'street_number' => '25/12',
                'zip_code' => '03601',
                'province' => 'province',
                'country' => 'country'
            ]);
        \App\Models\Venue::create([
                'name' => 'Venue 2',
                'description' => 'description of venue 2',
                'street' => 'ulica2',
                'street_number' => '25/12',
                'zip_code' => '03601',
                'province' => 'province',
                'country' => 'country'
        ]);
        \App\Models\Venue::create([
                'name' => 'Venue 3',
                'description' => 'description of venue 3',
                'street' => 'ulica3',
                'street_number' => '25/12',
                'zip_code' => '03601',
                'province' => 'province',
                'country' => 'country'
        ]) ;

        \App\Models\Event::create([
                'host_id' => 1,
                'name' => 'Event 1',
                'description' => 'Description of event 1',
                'created_at' => now(),
                'updated_at' => now(),
                'start_time' => '2023-10-20 15:30:00',
                'end_time' => '2023-10-21 15:30:00',
                'website' => 'https://www.google.com',
                'venue_id' => 1,
                'requested_approval' => true,
                'approved' => true
        ]);
        \App\Models\Event::create([
                'host_id' => 2,
                'name' => 'Event 2',
                'description' => 'Description of event 2',
                'created_at' => now(),
                'updated_at' => now(),
                'start_time' => '2023-10-20 15:30:00',
                'end_time' => '2023-10-21 15:30:00',
                'website' => 'https://www.google.com',
                'venue_id' => 2,
                'requested_approval' => true,
                'approved' => true
        ]);
        \App\Models\Event::create([
                'host_id' => 3,
                'name' => 'Event 3',
                'description' => 'Description of event 3',
                'created_at' => now(),
                'updated_at' => now(),
                'start_time' => '2023-10-20 15:30:00',
                'end_time' => '2023-10-21 15:30:00',
                'website' => 'https://www.google.com',
                'venue_id' => 3
        ]);
        \App\Models\Event::create([
                'host_id' => 1,
                'name' => 'Event 4',
                'description' => 'Description of event 4',
                'created_at' => now(),
                'updated_at' => now(),
                'start_time' => '2023-10-20 15:30:00',
                'end_time' => '2023-10-21 15:30:00',
                'website' => 'https://www.google.com',
                'venue_id' => 2
        ]);
    }
}
