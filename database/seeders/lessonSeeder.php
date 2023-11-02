<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class lessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("lessons")->insert([
            'startTime' => '7:15',
            'endTime' => "10:00"
        ]);
        DB::table("lessons")->insert([
            'startTime' => '10:00',
            'endTime' => "11:30"
        ]);
        DB::table("lessons")->insert([
            'startTime' => '12:30',
            'endTime' => "3:40"
        ]);
        DB::table("lessons")->insert([
            'startTime' => '3:40',
            'endTime' => "5:10"
        ]);
    }
}
