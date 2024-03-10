<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OccupantHouse;
use Faker\Factory as Faker;

class OccupantHouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            OccupantHouse::create([
                'occupant_id' => $faker->numberBetween(1, 10),
                'house_id' => $faker->numberBetween(1, 10),
                'start_date' => $faker->date,
                'end_date' => $faker->date,
            ]);
        }
    }
}
