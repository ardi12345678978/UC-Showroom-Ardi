<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Menentukan nama tabel
    protected $table = 'orders';

    // Menentukan kunci utama
    protected $primaryKey = 'order_id';

    // Menentukan kolom yang dapat diisi
    protected $fillable = ['customer_id', 'vehicle_id'];

    // Merepresentasikan hubungan satu-banyak dengan model Customer.
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    // Merepresentasikan hubungan satu-banyak dengan model Vehicle.
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'vehicle_id');
    }
}
