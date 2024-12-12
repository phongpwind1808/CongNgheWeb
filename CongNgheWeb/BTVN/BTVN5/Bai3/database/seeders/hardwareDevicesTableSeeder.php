<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class hardwareDevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Lấy tất cả các id từ bảng libraries
        $centerIds = DB::table('it_centers')->pluck('id')->toArray();

        // Kiểm tra nếu bảng libraries có dữ liệu
        if (empty($centerIds)) {
            echo "Không có thư viện nào trong bảng libraries!";
            return;
        }

        for ($i = 0; $i < 10; $i++) {
            DB::table('hardware_devices')->insert([
                'device_name' => $faker->name, 
                'type' => $faker->sentence,    
                'status' => $faker->word,
                'center_id' => $faker->randomElement($centerIds), // Lấy id ngẫu nhiên từ danh sách library_id
            ]);
        }
    }
}
