<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    // Define table name
    protected $table = 'vehicles';

    // Define primary key
    protected $primaryKey = 'vehicle_id';

    // Define fillable columns
    protected $fillable = ['type', 'model', 'year', 'passenger_count', 'manufacturer', 'price'];

    // Represent a one-to-many relationship with the Order model.
    public function order()
    {
        return $this->hasMany(Order::class);
    }

    // Represent a one-to-one relationship with the Car model.
    public function car()
    {
        return $this->hasOne(Car::class, 'vehicle_id', 'vehicle_id');
    }

    // Represent a one-to-one relationship with the Motorcycle model.
    public function motorcycle()
    {
        return $this->hasOne(Motorcycle::class, 'vehicle_id', 'vehicle_id');
    }

    // Represent a one-to-one relationship with the Truck model.
    public function truck()
    {
        return $this->hasOne(Truck::class, 'vehicle_id', 'vehicle_id');
    }
}
