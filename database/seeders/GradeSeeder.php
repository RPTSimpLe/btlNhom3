<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        DB::table('grades')->insert([
            'name' => 'DH13C1',
            'gvcn' => "2023130001 - Do van Thang",
            'department_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('grades')->insert([
            'name' => 'DH13C10',
            'gvcn' => "2023130002 - Phan Huy Anh",
            'department_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('grades')->insert([
            'name' => 'DH13KT1',
            'gvcn' => '2023130006 - Nguyen Nhat Minh',
            'department_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('grades')->insert([
            'name' => 'DH13KT2',
            'gvcn' => "2023130004 - Nguyen Hai Dang",
            'department_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('grades')->insert([
            'name' => 'DH13QLDD1',
            'gvcn' => '2023130007 - Dinh Xuan Truong',
            'department_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('grades')->insert([
            'name' => 'DH13QLDD2',
            'gvcn' => '2023130008 - Phan Van Hai',
            'department_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('grades')->insert([
            'name' => 'DH13NN1',
            'gvcn' => '2023130010 - Chu Van Duy',
            'department_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('grades')->insert([
            'name' => 'DH13NN2',
            'gvcn' => '2023130012 - Nguyen Van Xuyen',
            'department_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
