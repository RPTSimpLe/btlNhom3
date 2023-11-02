<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(GradeSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(lessonSeeder::class);
        $this->call(SubjectSeeder::class);

    }
}
