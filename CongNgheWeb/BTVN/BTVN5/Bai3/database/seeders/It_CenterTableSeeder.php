<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class It_CenterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i = 0; $i < 10 ; $i++){
            DB::table("it_centers")->insert([
                "name"=> $faker->name,
                "location"=> $faker->sentence,
                "contact_email"=> $faker->email,
            ]);
        }
    }
}
