<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

// Seeder imports
use Database\Seeders\DivisionSeeder;
use Database\Seeders\DistrictSeeder;
use Database\Seeders\UpazilaSeeder;
use Database\Seeders\UnionSeeder;
use Database\Seeders\WardSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Example: User::factory(10)->create();

        $this->call([        
            DivisionSeeder::class,
            DistrictSeeder::class,
            UpazilaSeeder::class,
            UnionSeeder::class,
            WardSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}