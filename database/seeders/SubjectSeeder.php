<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subjects')->insert([
            'name' => 'JAVA',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table("departments_subjects")->insert([
            'department_id' => 1,
            "subject_id" =>1,
            "lessonCount"=>45,
            "creditUnit"=>3,
        ]);

        DB::table('subjects')->insert([
            'name' => 'PHP',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table("departments_subjects")->insert([
            'department_id' => 1,
            "subject_id" =>2,
            "lessonCount"=>20,
            "creditUnit"=>2,
        ]);

        DB::table('subjects')->insert([
            'name' => 'Kinh Tế',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table("departments_subjects")->insert([
            'department_id' => 2,
            "subject_id" =>3,
            "lessonCount"=>20,
            "creditUnit"=>2,
        ]);

        DB::table('subjects')->insert([
            'name' => 'Kinh Tế 2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table("departments_subjects")->insert([
            'department_id' => 2,
            "subject_id" =>4,
            "lessonCount"=>45,
            "creditUnit"=>3,
        ]);

        DB::table('subjects')->insert([
            'name' => 'Đo Đất',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table("departments_subjects")->insert([
            'department_id' => 3,
            "subject_id" =>5,
            "lessonCount"=>20,
            "creditUnit"=>2,
        ]);

        DB::table('subjects')->insert([
            'name' => 'Kiểm Tra Đất',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table("departments_subjects")->insert([
            'department_id' => 3,
            "subject_id" =>6,
            "lessonCount"=>45,
            "creditUnit"=>3,
        ]);

        DB::table('subjects')->insert([
            'name' => 'Tiếng Anh',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table("departments_subjects")->insert([
            'department_id' => 4,
            "subject_id" =>7,
            "lessonCount"=>20,
            "creditUnit"=>2,
        ]);

        DB::table('subjects')->insert([
            'name' => 'Tiếng Em',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table("departments_subjects")->insert([
            'department_id' => 4,
            "subject_id" =>8,
            "lessonCount"=>45,
            "creditUnit"=>3,
        ]);

    }
}
