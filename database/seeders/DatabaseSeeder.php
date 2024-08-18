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
        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'amount' => "10000000",
            'role' => 0,
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Client User',
        //     'phone' => '09451340513',
        //     'email' => 'example@example.com',
        //     'role' => 1,
        // ]);

        // \App\Models\User::factory(10)->create();

        // // Create 30 transition histories
        // \App\Models\TransitionHistory::factory(30)->create();
    }
}