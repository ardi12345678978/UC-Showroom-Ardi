<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // Define table name
    protected $table = 'customers';

    // Define primary key
    protected $primaryKey = 'customer_id';

    // Define fillable columns
    protected $fillable = ['name', 'address', 'phone_number', 'id_card'];

    // Represent a one-to-many relationship with the Order model.
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
