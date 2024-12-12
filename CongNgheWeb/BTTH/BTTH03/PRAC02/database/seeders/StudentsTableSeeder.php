<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        
        $classIds = DB::table('classes')->pluck('id')->toArray();

       
        if (empty($classIds)) {
            echo "Không có ban ghi nào trong bảng !";
            return;
        }

        for ($i = 0; $i < 10; $i++) {
            DB::table('students')->insert([
                'class_id' => $faker->randomElement($classIds), 
                'first_name' => $faker->name, 
                'last_name' => $faker->name, 
                'date_of_birth'=>$faker->dateTime,   
                'parent_phone' => $faker->phoneNumber,  
            ]);
        }
    }
}
