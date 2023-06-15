<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'Super Admin' , 'guard_name' => 'api'],
            ['name' => 'Marketing Manger' , 'guard_name' => 'api'],
            ['name' => 'HR Manger' , 'guard_name' => 'api'],
            ['name' => 'Repository Manger' , 'guard_name' => 'api'],
        ]);
    }
}
