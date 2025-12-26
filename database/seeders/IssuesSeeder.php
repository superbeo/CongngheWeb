<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class IssuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $faker = \Faker\Factory::create();

    // LẤY ID TỪ BẢNG COMPUTERS ĐÃ CÓ DỮ LIỆU
    $computerIds = DB::table('computers')->pluck('id')->toArray(); 

    foreach (range(1, 50) as $index) {
        DB::table('issues')->insert([
            'computer_id' => $faker->randomElement($computerIds), // Gán ID máy tính hợp lệ
            'reported_by' => $faker->name,
            'reported_date' => $faker->dateTime(),
            'description' => $faker->paragraph,
            'urgency' => $faker->randomElement(['Low', 'Medium', 'High']),
            'status' => $faker->randomElement(['Open', 'In Progress', 'Resolved']),
            'created_at' => now(),
        ]);
    }

    }
}
