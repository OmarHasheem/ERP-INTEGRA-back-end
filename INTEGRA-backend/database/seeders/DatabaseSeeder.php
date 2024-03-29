<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call ([
            PermissionsSeeder::class,
            RolesSeeder::class,
            RolePermissionsSeeder::class,
            UserSeeder::class,
            UserRoleSeeder::class,
            HRSeeder::class,
            MarketingSeeder::class,
            RepositorySeeder::class
        ]);
    }
}
