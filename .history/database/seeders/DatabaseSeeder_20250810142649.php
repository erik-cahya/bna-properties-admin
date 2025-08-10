<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Master',
            'email' => 'master@gmail.com',
            'password' => bcrypt('master123'),
        ]);

        $this->call(RegionSeeder::class);
        $this->call(FeaturePropertiesSeeder::class);
        $this->call(PropertySeeder::class);

    }
}
