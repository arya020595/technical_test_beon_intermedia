<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Expense;
use Faker\Factory as Faker;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Expense::create([
                'expense_date' => $faker->date,
                'expense_description' => $faker->sentence,
                'expense_amount' => $faker->randomFloat(2, 10, 100),
            ]);
        }
    }
}
