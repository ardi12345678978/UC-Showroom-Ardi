<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    // Menentukan nama tabel
    protected $table = 'vehicles';

    // Menentukan kunci utama
    protected $primaryKey = 'vehicle_id';

    // Menentukan kolom yang dapat diisi
    protected $fillable = ['type', 'model', 'year', 'passenger_count', 'manufacturer', 'price'];

    // Merepresentasikan hubungan satu-banyak dengan model Order.
    public function order()
    {
        return $this->hasMany(Order::class);
    }

    // Merepresentasikan hubungan satu-satu dengan model Car.
    public function car()
    {
        return $this->hasOne(Car::class, 'vehicle_id', 'vehicle_id');
    }

    // Merepresentasikan hubungan satu-satu dengan model Motorcycle.
    public function motorcycle()
    {
        return $this->hasOne(Motorcycle::class, 'vehicle_id', 'vehicle_id');
    }

    // Merepresentasikan hubungan satu-satu dengan model Truck.
    public function truck()
    {
        return $this->hasOne(Truck::class, 'vehicle_id', 'vehicle_id');
    }
}
