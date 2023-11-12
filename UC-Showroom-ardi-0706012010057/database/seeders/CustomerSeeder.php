<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        // Create 10 dummy customers
        for ($i = 0; $i < 10; $i++) {
            Customer::create([
                'name' => $faker->name,
                'address' => $faker->address,
                'phone_number' => $faker->phoneNumber,
                'id_card' => $faker->unique()->randomNumber(8),
            ]);
        }
    }
}
