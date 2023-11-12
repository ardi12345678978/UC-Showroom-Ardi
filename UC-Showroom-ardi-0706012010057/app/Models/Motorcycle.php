<?php

namespace App\Models;

class Motorcycle extends Vehicle
{
    // Menentukan nama tabel
    protected $table = 'motorcycles';

    // Menentukan kunci utama
    protected $primaryKey = 'motorcycle_id';

    // Menentukan kolom yang dapat diisi
    protected $fillable = ['trunk_size_motorcycle', 'fuel_capacity'];

    // Merepresentasikan hubungan satu-satu dengan model Vehicle.
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
