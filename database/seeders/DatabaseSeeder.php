<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categories;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'hanafichoi',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin11'),
        ]);

        Categories::factory(50)->create();
        Posts::factory(100)->create();
    }
}
