<?php

namespace App\Models;

class Truck extends Vehicle
{
    // Menentukan nama tabel
    protected $table = 'trucks';

    // Menentukan kunci utama
    protected $primaryKey = 'truck_id';

    // Menentukan kolom yang dapat diisi
    protected $fillable = ['wheel_count', 'cargo_area_size'];

    // Merepresentasikan hubungan satu-satu dengan model Vehicle.
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
