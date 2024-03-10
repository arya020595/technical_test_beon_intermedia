<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\House;
use Faker\Factory as Faker;

class HouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            House::create([
                'name' => $faker->word,
                'occupant_id' => $faker->numberBetween(1, 10),
                'is_inhabited' => $faker->boolean,
                'is_rented' => $faker->boolean,
            ]);
        }
    }
}
