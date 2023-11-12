<?php

namespace App\Models;

class Car extends Vehicle
{
    // Define table name
    protected $table = 'cars';

    // Define primary key
    protected $primaryKey = 'car_id';

    // Define fillable columns
    protected $fillable = ['fuel_type', 'trunk_size_car'];

    // Represent a one-to-one relationship with the Vehicle model.
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
