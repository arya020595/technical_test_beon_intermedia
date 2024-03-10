<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DuesType;
use Faker\Factory as Faker;

class DuesTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 5) as $index) {
            DuesType::create([
                'dues_description' => $faker->word,
                'dues_amount' => $faker->randomFloat(2, 10, 100),
            ]);
        }
    }
}
