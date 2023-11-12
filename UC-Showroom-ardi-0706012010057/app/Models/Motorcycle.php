<?php

namespace App\Models;

class Motorcycle extends Vehicle
{
    // Define table name
    protected $table = 'motorcycles';

    // Define primary key
    protected $primaryKey = 'motorcycle_id';

    // Define fillable columns
    protected $fillable = ['trunk_size_motorcycle', 'fuel_capacity'];

    // Represent a one-to-one relationship with the Vehicle model.
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
