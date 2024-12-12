<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LaptopsTableSeede extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Lấy tất cả các id từ bảng libraries
        $RentersIds = DB::table('renters')->pluck('id')->toArray();

        // Kiểm tra nếu bảng libraries có dữ liệu
        if (empty($RentersIds)) {
            echo "Không có ban ghi nào trong bảng Renters!";
            return;
        }

        for ($i = 0; $i < 10; $i++) {
            DB::table('laptops')->insert([
                'brand' => $faker->sentence, // Đổi thành sentence để có câu hoàn chỉnh
                'model' => $faker->name,    // Dùng name cho tác giả
                'specifications' => $faker->word, // Dùng year cho năm xuất bản
                'rental_status' => $faker->word,    // Dùng word cho thể loại
                'renter_id' => $faker->randomElement($RentersIds), // Lấy id ngẫu nhiên từ danh sách library_id
            ]);
        }
    }
}
