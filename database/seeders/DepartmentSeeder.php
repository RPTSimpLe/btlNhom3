<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            'name' => 'Khoa Công nghệ thông tin',
            'code' => 'CNTT',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('departments')->insert([
            'name' => 'Khoa Kế toán',
            'code' => 'KT',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('departments')->insert([
            'name' => 'Khoa quản lý đất đai',
            'code' => 'QLDD',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('departments')->insert([
            'name' => 'Khoa Ngoại ngữ',
            'code' => 'NN',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
