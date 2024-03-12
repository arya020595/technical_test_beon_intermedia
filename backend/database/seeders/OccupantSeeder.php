<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Occupant;
use Faker\Factory as Faker;

class OccupantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Occupant::create([
                'name' => $faker->name,
                'image_ktp_url' => $faker->imageUrl(),
                'occupant_status' => $faker->randomElement(['permanent', 'contract']),
                'phone_number' => $faker->phoneNumber,
                'is_married' => $faker->boolean,
            ]);
        }
    }
}
