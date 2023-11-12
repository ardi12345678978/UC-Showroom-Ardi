<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    /**
     * Display a listing of the vehicles.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new vehicle.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('vehicles.create');
    }

    /**
     * Store a newly created vehicle in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validates and stores a newly created vehicle in the database.
        $request->validate([
            'type' => 'required|in:Car,Motorcycle,Truck',
            'model' => 'required',
            'year' => 'required',
            'passenger_count' => 'required',
            'manufacturer' => 'required',
            'price' => 'required',
        ]);

        // Create the main vehicle record
        $vehicle = Vehicle::create($request->only(['type', 'model', 'year', 'passenger_count', 'manufacturer', 'price']));

        // Create the specific type record based on the selected type
        if ($request->type === 'Car') {
            $vehicle->car()->create($request->only(['fuel_type', 'trunk_size_car']));
        } elseif ($request->type === 'Motorcycle') {
            $vehicle->motorcycle()->create($request->only(['trunk_size_motorcycle', 'fuel_capacity']));
        } elseif ($request->type === 'Truck') {
            $vehicle->truck()->create($request->only(['wheel_count', 'cargo_area_size']));
        }

        // Redirect to the index page with a success message
        return redirect()->route('vehicles.index')->with('success', 'Vehicle created successfully');
    }

    /**
     * Display the specified vehicle.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\View\View
     */
    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified vehicle.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\View\View
     */
    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    /**
     * Update the specified vehicle in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        // Validates and updates the specified vehicle in the database.
        $request->validate([
            'model' => 'required',
            'year' => 'required',
            'passenger_count' => 'required',
            'manufacturer' => 'required',
            'price' => 'required',
        ]);

        // Update the main vehicle record
        $vehicle->update($request->only(['model', 'year', 'passenger_count', 'manufacturer', 'price']));

        // Update the specific type record based on the selected type
        if ($vehicle->type === 'Car') {
            $vehicle->car->update($request->only(['fuel_type', 'trunk_size_car']));
        } elseif ($vehicle->type === 'Motorcycle') {
            $vehicle->motorcycle->update($request->only(['trunk_size_motorcycle', 'fuel_capacity']));
        } elseif ($vehicle->type === 'Truck') {
            $vehicle->truck->update($request->only(['wheel_count', 'cargo_area_size']));
        }

        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully');
    }

    /**
     * Remove the specified vehicle from the database.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Vehicle $vehicle)
    {
        // Deletes a specific vehicle from the database.
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted successfully');
    }
}
