<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            DB::table("classes")->insert([
                "grade_level" => $faker->randomElement(['Pre-k', 'Kindergarten']),
                "room_number" => $faker->randomElement(['PH01', 'PH02']),
            ]);
        }
    }
}
