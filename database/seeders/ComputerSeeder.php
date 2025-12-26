<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ComputerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

foreach (range(1, 50) as $index) {
    DB::table('computers')->insert([
        'computer_name' => 'Lab1-PC' . $index,
        'model' => $faker->randomElement([
            'Dell Optiplex 7090',
            'HP ProDesk 600',
            'Lenovo ThinkCentre'
        ]),
        'operating_system' => $faker->randomElement([
            'Windows 10 Pro',
            'Windows 11',
            'Ubuntu 22.04'
        ]),
        'processor' => $faker->randomElement([
            'Intel Core i5-11400',
            'Intel Core i7-12700',
            'AMD Ryzen 5 5600G'
        ]),
        'memory' => $faker->randomElement([8, 16, 32]),
        'available' => $faker->boolean(),
        'created_at' => now(),
        'updated_at' => now(),
    ]);
}

    }
}
