<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Création des rôles par défaut de l'application
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);
    }
}
