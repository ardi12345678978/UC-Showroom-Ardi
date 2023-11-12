<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehicle;
use App\Models\Car;
use App\Models\Motorcycle;
use App\Models\Truck;

class VehicleSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        // Seed Vehicles
        for ($i = 0; $i < 10; $i++) {
            // Determine the type of the vehicle
            $type = $faker->randomElement(['Car', 'Motorcycle', 'Truck']);

            $vehicle = Vehicle::create([
                'model' => $faker->word,
                'year' => $faker->year,
                'passenger_count' => $faker->numberBetween(2, 6),
                'manufacturer' => $faker->company,
                'price' => $faker->randomFloat(2, 10000, 50000),
                'type' => $type, // Set the type here
            ]);

            // Seed related models based on the type of vehicle
            $this->seedRelatedModel($vehicle);
        }
    }

    protected function seedRelatedModel(Vehicle $vehicle)
    {
        $faker = \Faker\Factory::create();

        // Seed Car
        if ($vehicle->type == 'Car') {
            Car::create([
                'fuel_type' => $faker->randomElement(['Gasoline', 'Diesel', 'Electric']),
                'trunk_size_car' => $faker->randomFloat(2, 10, 30),
                'vehicle_id' => $vehicle->vehicle_id,
            ]);
        }

        // Seed Motorcycle
        if ($vehicle->type == 'Motorcycle') {
            Motorcycle::create([
                'trunk_size_motorcycle' => $faker->randomFloat(2, 1, 5),
                'fuel_capacity' => $faker->randomFloat(2, 5, 20),
                'vehicle_id' => $vehicle->vehicle_id,
            ]);
        }

        // Seed Truck
        if ($vehicle->type == 'Truck') {
            Truck::create([
                'wheel_count' => $faker->numberBetween(4, 18),
                'cargo_area_size' => $faker->randomFloat(2, 50, 200),
                'vehicle_id' => $vehicle->vehicle_id,
            ]);
        }
    }
}
