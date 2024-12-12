<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Lấy tất cả các id từ bảng libraries
        $medicineIds = DB::table('medicines')->pluck('id')->toArray();

        // Kiểm tra nếu bảng libraries có dữ liệu
        if (empty($medicineIds)) {
            echo "Không có ban ghi nào trong bảng !";
            return;
        }

        for ($i = 0; $i < 10; $i++) {
            DB::table('sales')->insert([
                'medicine_id' => $faker->randomElement($medicineIds), // Lấy id ngẫu nhiên từ danh sách library_id
                'quantity' => $faker->numberBetween(1000, 20002000), // Đổi thành sentence để có câu hoàn chỉnh
                'sale_date' => $faker->dateTime,    // Dùng name cho tác giả
                'custumer_phone' => $faker->phoneNumber, // Dùng year cho năm xuất bản
                
            ]);
        }
    }
}
