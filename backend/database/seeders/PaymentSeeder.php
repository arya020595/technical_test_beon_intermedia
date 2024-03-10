<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Payment;
use Faker\Factory as Faker;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Payment::create([
                'occupant_id' => $faker->numberBetween(1, 10),
                'house_id' => $faker->numberBetween(1, 10),
                'dues_type_id' => $faker->numberBetween(1, 5), // Assuming you have 5 types of dues
                'billing_start_date' => $faker->date,
                'billing_end_date' => $faker->date,
                'payment_date' => $faker->date,
                'payment_amount' => $faker->randomFloat(2, 50, 500),
                'payment_proof_url' => $faker->imageUrl(),
                'is_paid' => $faker->boolean,
            ]);
        }
    }
}
