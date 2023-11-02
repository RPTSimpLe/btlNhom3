<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
        $names = [
            "Nguyễn Thanh Tùng",
            "Trần Thị Ngọc Ánh",
            "Lê Thị Thùy Linh",
            "Phạm Văn Hùng",
            "Đỗ Minh Hiếu",
            "Vũ Thị Thu Hà",
            "Hoàng Văn Hải",
            "Nguyễn Thị Hồng Nhung",
            "Trần Văn Đức",
            "Bùi Thị Thu Hương",
            "Lê Văn Duy",
            "Phan Thị Kim Ngân",
            "Đặng Văn Tú",
            "Nguyễn Thị Mai Anh",
            "Trần Văn Minh",
            "Lê Thị Thu Hiền",
            "Vũ Văn Tuấn",
            "Hoàng Thị Thu Hà",
            "Phạm Văn Tâm",
            "Đỗ Thị Thanh Hương"
        ];
        $phones = [
            "0987654321",
            "0912345678",
            "0975123456",
            "0934567890",
            "0967890123",
            "0943210765",
            "0987654320",
            "0912345679",
            "0975123457",
            "0934567891",
            "0967890124",
            "0943210766",
            "0987654322",
            "0912345677",
            "0975123455",
            "0934567892",
            "0967890125",
            "0943210767",
            "0987654323",
            "0912345676"
        ];

        $x=18;
        for ($i = 1; $i <= 20; $i++) {
            $name = $names[$i % count($names)];
            $phone = $phones[$i % count($phones)];

            $user = User::create([
                'name' => $name,
                'email' => $faker->unique()->safeEmail,
                'code' => $i<10 ? "231300000$i" : "23130000$i",
                'password' => Hash::make('12345678'),
                'role' => 'student',
            ]);

            Student::create([
                'name' => $name,
                'address' => $faker->address,
                'age' => $faker->numberBetween(18, 25),
                'phone' => $phone,
                'DateOfBirth' => $faker->date(),
                'gender' => $faker->randomElement(['nam', 'nữ']),
                'user_id' => $x,
                'grade_id'=> $faker->numberBetween(1,8),
            ]);
            $x++;
        }
    }
}
