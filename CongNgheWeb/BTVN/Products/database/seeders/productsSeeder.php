<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class productsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach(range(1,90) as $index) {
            DB::table("products")->insert([
                "product_name"=> $faker->name,
                "description"=> $faker->sentence,
                "price"=> $faker->numberBetween(2000, 3000),
                "image"=> $faker->imageUrl,
                "category_name"=> $faker->randomElement(['detective','comedy','romantic']),
                "created_at"=> $faker->dateTimeBetween('-1 year','now'),
                "updated_at"=> $faker->dateTime('now')
            ]);
        }
    }
}

