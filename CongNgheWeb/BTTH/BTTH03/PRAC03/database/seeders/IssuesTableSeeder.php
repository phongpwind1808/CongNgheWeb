<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker; 

class IssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        
        $cptIds = DB::table('computers')->pluck('id')->toArray();

       
        if (empty($cptIds)) {
            echo "Không có ban ghi nào trong bảng !";
            return;
        }

        for ($i = 0; $i < 10; $i++) {
            DB::table('issues')->insert([
                "computer_id" => $faker->randomElement($cptIds), 
                "reporter_by" => $faker->name, 
                "reporter_date"=>$faker->dateTime,   
                "description" => $faker->sentence,  
                "urgency"=> $faker->randomElement(['Low', 'Medium','High']),
                "status"=> $faker->randomElement(['Open', 'In process','Resolved']),
            ]);
        }
    }
}
