<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Le Thai Duong',
            'code' => 1,
            'email' => 'admin1@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'AdminOne',
            'code' => 2,
            'email' => 'admin2@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'AdminTwo',
            'code' => 3,
            'email' => 'admin3@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'AdminThree',
            'code' => 4,
            'email' => 'admin4@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'AdminFour',
            'code' => 5,
            'email' => 'admin5@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);

    }
}
