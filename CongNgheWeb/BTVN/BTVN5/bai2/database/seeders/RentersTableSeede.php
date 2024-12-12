<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RentersTableSeede extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i = 0; $i < 10 ; $i++){
            DB::table("renters")->insert([
                "name"=> $faker->word,
                "phone_number"=> $faker->phoneNumber,
                "email"=> $faker->email,
            ]);
        }
    }
}
