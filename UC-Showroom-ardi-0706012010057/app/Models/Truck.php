<?php

namespace App\Models;

class Truck extends Vehicle
{
    // Define table name
    protected $table = 'trucks';

    // Define primary key
    protected $primaryKey = 'truck_id';

    // Define fillable columns
    protected $fillable = ['wheel_count', 'cargo_area_size'];

    // Represent a one-to-one relationship with the Vehicle model.
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
