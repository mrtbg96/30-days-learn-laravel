<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User Seeder
        $this->call(UserSeeder::class);

        // Job Seeder
        $this->call(JobSeeder::class);
    }
}
