<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    /**
     * Menampilkan daftar semua kendaraan.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.index', compact('vehicles'));
    }

    /**
     * Menampilkan formulir untuk membuat kendaraan baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('vehicles.create');
    }

    /**
     * Menyimpan kendaraan baru ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi dan menyimpan kendaraan baru ke dalam database.
        $request->validate([
            'type' => 'required|in:Car,Motorcycle,Truck',
            'model' => 'required',
            'year' => 'required',
            'passenger_count' => 'required',
            'manufacturer' => 'required',
            'price' => 'required',
        ]);

        // Membuat catatan utama kendaraan
        $vehicle = Vehicle::create($request->only(['type', 'model', 'year', 'passenger_count', 'manufacturer', 'price']));

        // Membuat catatan tipe spesifik berdasarkan tipe yang dipilih
        if ($request->type === 'Car') {
            $vehicle->car()->create($request->only(['fuel_type', 'trunk_size_car']));
        } elseif ($request->type === 'Motorcycle') {
            $vehicle->motorcycle()->create($request->only(['trunk_size_motorcycle', 'fuel_capacity']));
        } elseif ($request->type === 'Truck') {
            $vehicle->truck()->create($request->only(['wheel_count', 'cargo_area_size']));
        }

        // Mengalihkan ke halaman indeks dengan pesan keberhasilan
        return redirect()->route('vehicles.index')->with('success', 'Kendaraan berhasil dibuat');
    }

    /**
     * Menampilkan kendaraan tertentu.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\View\View
     */
    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show', compact('vehicle'));
    }

    /**
     * Menampilkan formulir untuk mengedit kendaraan tertentu.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\View\View
     */
    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    /**
     * Memperbarui kendaraan tertentu di dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        // Validasi dan memperbarui kendaraan tertentu di dalam database.
        $request->validate([
            'model' => 'required',
            'year' => 'required',
            'passenger_count' => 'required',
            'manufacturer' => 'required',
            'price' => 'required',
        ]);

        // Memperbarui catatan utama kendaraan
        $vehicle->update($request->only(['model', 'year', 'passenger_count', 'manufacturer', 'price']));

        // Memperbarui catatan tipe spesifik berdasarkan tipe yang dipilih
        if ($vehicle->type === 'Car') {
            $vehicle->car->update($request->only(['fuel_type', 'trunk_size_car']));
        } elseif ($vehicle->type === 'Motorcycle') {
            $vehicle->motorcycle->update($request->only(['trunk_size_motorcycle', 'fuel_capacity']));
        } elseif ($vehicle->type === 'Truck') {
            $vehicle->truck->update($request->only(['wheel_count', 'cargo_area_size']));
        }

        return redirect()->route('vehicles.index')->with('success', 'Kendaraan berhasil diperbarui');
    }

    /**
     * Menghapus kendaraan tertentu dari database.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Vehicle $vehicle)
    {
        // Menghapus kendaraan tertentu dari database.
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success', 'Kendaraan berhasil dihapus');
    }
}
