<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Lấy tất cả các id từ bảng libraries
        $libraryIds = DB::table('libraries')->pluck('id')->toArray();

        // Kiểm tra nếu bảng libraries có dữ liệu
        if (empty($libraryIds)) {
            echo "Không có thư viện nào trong bảng libraries!";
            return;
        }

        for ($i = 0; $i < 10; $i++) {
            DB::table('books')->insert([
                'title' => $faker->sentence, // Đổi thành sentence để có câu hoàn chỉnh
                'author' => $faker->name,    // Dùng name cho tác giả
                'publication_year' => $faker->year, // Dùng year cho năm xuất bản
                'genre' => $faker->word,    // Dùng word cho thể loại
                'library_id' => $faker->randomElement($libraryIds), // Lấy id ngẫu nhiên từ danh sách library_id
            ]);
        }
    }
}
