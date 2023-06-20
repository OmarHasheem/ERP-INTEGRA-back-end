<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'firstName'    => 'Super Admin',
            'lastName'     => 'Super Admin',
            'dateOfBrith'  => '2102-11-02',
            'gender'       => 'male',
            'address'      => 'lol',
            'email'        => 'Super_Admin@gmail.com',
            'phone'        => '1',
            'dateOfHire'   => '2102-11-02',
            'salary'       => '1',
            'supervisorId' => '1',
            'status'       => 'Actual',
            'department_id' => '1',
        ]);



    }
}
