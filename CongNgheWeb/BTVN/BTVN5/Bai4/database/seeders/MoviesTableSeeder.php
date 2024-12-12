<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Lấy tất cả các id từ bảng libraries
        $cinemasIds = DB::table('cinemas')->pluck('id')->toArray();

        // Kiểm tra nếu bảng libraries có dữ liệu
        if (empty($cinemasIds)) {
            echo "Không có thư viện nào trong bảng libraries!";
            return;
        }

        for ($i = 0; $i < 10; $i++) {
            DB::table('movies')->insert([
                'title' => $faker->sentence, // Đổi thành sentence để có câu hoàn chỉnh
                'director' => $faker->name,    // Dùng name cho tác giả
                'release_date' => $faker->dateTime, // Dùng year cho năm xuất bản
                'duration' => $faker->numberBetween(40,50),    // Dùng word cho thể loại
                'cinema_id' => $faker->randomElement($cinemasIds), // Lấy id ngẫu nhiên từ danh sách library_id
            ]);
        }
    }
}
