<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
        //1
        DB::table('users')->insert([
            'name' => 'Do van Thang',
            'code' => 2023130001,
            'email' => $faker->email,
            'password' => Hash::make('12345678'),
            'role' => 'teacher',
        ]);
        DB::table('teachers')->insert([
            'name' => 'Do van Thang',
            'address' => $faker->address,
            'age' => $faker->numberBetween(25, 60),
            'phone' => "0987654321",
            'DateOfBirth' => $faker->date(),
            'gender' => $faker->randomElement(['nam', 'nữ']),
            'education' => $faker->randomElement(["đại học", 'thạc sĩ', 'tiến sĩ']),
            'department_id' => 1,
            'user_id' => 6,
        ]);
        //2
        DB::table('users')->insert([
            'name' => 'Phan Huy Anh',
            'code' => 2023130002,
            'email' => $faker->email,
            'password' => Hash::make('12345678'),
            'role' => 'teacher',
        ]);
        DB::table('teachers')->insert([
            'name' => 'Phan Huy Anh',
            'address' => $faker->address,
            'age' => $faker->numberBetween(25, 60),
            'phone' => "0912345678",
            'DateOfBirth' => $faker->date(),
            'gender' => $faker->randomElement(['nam', 'nữ']),
            'education' => $faker->randomElement(["đại học", 'thạc sĩ', 'tiến sĩ']),
            'department_id' => 1,
            'user_id' => 7,
        ]);
        //3
        DB::table('users')->insert([
            'name' => 'Cao Thi Thoa',
            'code' => 2023130003,
            'email' => $faker->email,
            'password' => Hash::make('12345678'),
            'role' => 'teacher',
        ]);
        DB::table('teachers')->insert([
            'name' => 'Cao Thi Thoa',
            'address' => $faker->address,
            'age' => $faker->numberBetween(25, 60),
            'phone' => "0975123456",
            'DateOfBirth' => $faker->date(),
            'gender' => $faker->randomElement(['nam', 'nữ']),
            'education' => $faker->randomElement(["đại học", 'thạc sĩ', 'tiến sĩ']),
            'department_id' => 1,
            'user_id' => 8,
        ]);
        //4
        DB::table('users')->insert([
            'name' => 'Nguyen Hai Dang',
            'code' => 2023130004,
            'email' => $faker->email,
            'password' => Hash::make('12345678'),
            'role' => 'teacher',
        ]);
        DB::table('teachers')->insert([
            'name' => 'Nguyen Hai Dang',
            'address' => $faker->address,
            'age' => $faker->numberBetween(25, 60),
            'phone' => "0934567890",
            'DateOfBirth' => $faker->date(),
            'gender' => $faker->randomElement(['nam', 'nữ']),
            'education' => $faker->randomElement(["đại học", 'thạc sĩ', 'tiến sĩ']),
            'department_id' => 2,
            'user_id' => 9,
        ]);
        //5
        DB::table('users')->insert([
            'name' => 'Bui Minh Vu',
            'code' => 2023130005,
            'email' => $faker->email,
            'password' => Hash::make('12345678'),
            'role' => 'teacher',
        ]);
        DB::table('teachers')->insert([
            'name' => 'Bui Minh Vu',
            'address' => $faker->address,
            'age' => $faker->numberBetween(25, 60),
            'phone' => "0967890123",
            'DateOfBirth' => $faker->date(),
            'gender' => $faker->randomElement(['nam', 'nữ']),
            'education' => $faker->randomElement(["đại học", 'thạc sĩ', 'tiến sĩ']),
            'department_id' => 2,
            'user_id' => 10,
        ]);
        //6
        DB::table('users')->insert([
            'name' => 'Nguyen Nhat Minh',
            'code' => 2023130006,
            'email' => $faker->email,
            'password' => Hash::make('12345678'),
            'role' => 'teacher',
        ]);
        DB::table('teachers')->insert([
            'name' => 'Nguyen Nhat Minh',
            'address' => $faker->address,
            'age' => $faker->numberBetween(25, 60),
            'phone' => "0943210765",
            'DateOfBirth' => $faker->date(),
            'gender' => $faker->randomElement(['nam', 'nữ']),
            'education' => $faker->randomElement(["đại học", 'thạc sĩ', 'tiến sĩ']),
            'department_id' => 2,
            'user_id' => 11,
        ]);
        //7
        DB::table('users')->insert([
            'name' => 'Dinh Xuan Truong',
            'code' => 2023130007,
            'email' => $faker->email,
            'password' => Hash::make('12345678'),
            'role' => 'teacher',
        ]);
        DB::table('teachers')->insert([
            'name' => 'Dinh Xuan Truong',
            'address' => $faker->address,
            'age' => $faker->numberBetween(25, 60),
            'phone' => "0987654320",
            'DateOfBirth' => $faker->date(),
            'gender' => $faker->randomElement(['nam', 'nữ']),
            'education' => $faker->randomElement(["đại học", 'thạc sĩ', 'tiến sĩ']),
            'department_id' => 3,
            'user_id' => 12,
        ]);
        //8
        $user8=DB::table('users')->insert([
            'name' => 'Phan Van Hai',
            'code' => 2023130008,
            'email' => $faker->email,
            'password' => Hash::make('12345678'),
            'role' => 'teacher',
        ]);
        DB::table('teachers')->insert([
            'name' => 'Phan Van Hai',
            'address' => $faker->address,
            'age' => $faker->numberBetween(25, 60),
            'phone' => "0912345679",
            'DateOfBirth' => $faker->date(),
            'gender' => $faker->randomElement(['nam', 'nữ']),
            'education' => $faker->randomElement(["đại học", 'thạc sĩ', 'tiến sĩ']),
            'department_id' => 3,
            'user_id' => 13,
        ]);
        //9
        $user9=DB::table('users')->insert([
            'name' => 'Do Nhat Minh',
            'code' => 2023130009,
            'email' => $faker->email,
            'password' => Hash::make('12345678'),
            'role' => 'teacher',
        ]);
        DB::table('teachers')->insert([
            'name' => 'Do Nhat Minh',
            'address' => $faker->address,
            'age' => $faker->numberBetween(25, 60),
            'phone' => "0975123457",
            'DateOfBirth' => $faker->date(),
            'gender' => $faker->randomElement(['nam', 'nữ']),
            'education' => $faker->randomElement(["đại học", 'thạc sĩ', 'tiến sĩ']),
            'department_id' => 3,
            'user_id' => 14,
        ]);
        //10
        $user10=DB::table('users')->insert([
            'name' => 'Chu Van Duy',
            'code' => 2023130010,
            'email' => $faker->email,
            'password' => Hash::make('12345678'),
            'role' => 'teacher',
        ]);
        DB::table('teachers')->insert([
            'name' => 'Chu Van Duy',
            'address' => $faker->address,
            'age' => $faker->numberBetween(25, 60),
            'phone' => "0934567891",
            'DateOfBirth' => $faker->date(),
            'gender' => $faker->randomElement(['nam', 'nữ']),
            'education' => $faker->randomElement(["đại học", 'thạc sĩ', 'tiến sĩ']),
            'department_id' => 4,
            'user_id' => 15,
        ]);
        //11
        $user11=DB::table('users')->insert([
            'name' => 'Nguyen Thi Dieu',
            'code' => 2023130011,
            'email' => $faker->email,
            'password' => Hash::make('12345678'),
            'role' => 'teacher',
        ]);
        DB::table('teachers')->insert([
            'name' => 'Nguyen Thi Dieu',
            'address' => $faker->address,
            'age' => $faker->numberBetween(25, 60),
            'phone' => "0967890124",
            'DateOfBirth' => $faker->date(),
            'gender' => $faker->randomElement(['nam', 'nữ']),
            'education' => $faker->randomElement(["đại học", 'thạc sĩ', 'tiến sĩ']),
            'department_id' => 4,
            'user_id' => 16,
        ]);
        //12
        $user12=DB::table('users')->insert([
            'name' => 'Nguyen Van Xuyen',
            'code' => 2023130012,
            'email' => $faker->email,
            'password' => Hash::make('12345678'),
            'role' => 'teacher',
        ]);
        DB::table('teachers')->insert([
            'name' => 'Nguyen Van Xuyen',
            'address' => $faker->address,
            'age' => $faker->numberBetween(25, 60),
            'phone' => "0943210766",
            'DateOfBirth' => $faker->date(),
            'gender' => $faker->randomElement(['nam', 'nữ']),
            'education' => $faker->randomElement(["đại học", 'thạc sĩ', 'tiến sĩ']),
            'department_id' => 4,
            'user_id' => 17,
        ]);
    }
}
