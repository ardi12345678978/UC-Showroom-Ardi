<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Vehicle;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    public function run()
    {
        // Fetch all customers and vehicles
        $customers = Customer::inRandomOrder()->get();
        $vehicles = Vehicle::inRandomOrder()->get();

        // Ensure there are customers and vehicles
        if ($customers->isNotEmpty() && $vehicles->isNotEmpty()) {
            // Log customer details for debugging
            dump("Fetched Customers: " . $customers->pluck('customer_id')->implode(', '));

            // Seed Orders
            foreach ($customers as $customer) {
                $vehicle = $vehicles->pop(); // Use pop to get and remove the last element

                // Check for null values before creating orders
                if (!is_null($customer->customer_id) && !is_null($vehicle->vehicle_id)) {
                    // Debug information
                    dump("Creating order for customer_id: {$customer->id}, vehicle_id: {$vehicle->customer_id}");

                    Order::create([
                        'customer_id' => $customer->customer_id,
                        'vehicle_id' => $vehicle->vehicle_id,
                    ]);
                } else {
                    dump("Skipping order creation for invalid customer or vehicle. Customer ID: {$customer->customer_id}, Vehicle ID: {$vehicle->vehicle_id}");
                }
            }
        } else {
            $this->command->info('No customers or vehicles found. Skipping Order seeding.');
        }
    }
}
