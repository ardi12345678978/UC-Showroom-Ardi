<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // Menentukan nama tabel
    protected $table = 'customers';

    // Menentukan kunci utama
    protected $primaryKey = 'customer_id';

    // Menentukan kolom yang dapat diisi
    protected $fillable = ['name', 'address', 'phone_number', 'id_card'];

    // Merepresentasikan hubungan satu-banyak dengan model Order.
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
