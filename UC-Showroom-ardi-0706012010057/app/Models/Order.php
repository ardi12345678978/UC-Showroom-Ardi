<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Define table name
    protected $table = 'orders';

    // Define primary key
    protected $primaryKey = 'order_id';

    // Define fillable columns
    protected $fillable = ['customer_id', 'vehicle_id'];

    // Represent a one-to-many relationship with the Customer model.
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    // Represent a one-to-many relationship with the Vehicle model.
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'vehicle_id');
    }
}
