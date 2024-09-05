<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([

            // Admin
            [
            'name'      => 'Ken Adams',
            'username'  => 'superadmin',
            'email'     => 'ken@gmail.com',
            'password'  => Hash::make('ken12345'),
            'role'      => 'admin',
            'status'    => 'active',
            ],

            // Vendor
            [
                'name'      => 'Sophia Justin',
                'username'  => 'vendor',
                'email'     => 'sophia@gmail.com',
                'password'  => Hash::make('sophia12345'),
                'role'      => 'vendor',
                'status'    => 'active',
            ],

            // User or Customer
            [
                'name'      => 'Shakeel',
                'username'  => 'user',
                'email'     => 'shakeel@gmail.com',
                'password'  => Hash::make('shakeel12345'),
                'role'      => 'user',
                'status'    => 'active',
            ]

        ]);
    }
}
