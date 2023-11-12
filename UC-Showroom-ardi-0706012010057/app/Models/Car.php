<?php

namespace App\Models;

class Car extends Vehicle
{
    // Menentukan nama tabel
    protected $table = 'cars';

    // Menentukan kunci utama
    protected $primaryKey = 'car_id';

    // Menentukan kolom yang dapat diisi
    protected $fillable = ['fuel_type', 'trunk_size_car'];

    // Merepresentasikan hubungan satu-satu dengan model Vehicle.
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
