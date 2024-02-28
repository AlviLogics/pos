<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = ['sale_to_id','sale_type', 'product_id', 'packing_id','rate' ,'quantity', 'total_amount', 'sale_date'];

    // Define the relationship with Customers
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Define the relationship with Packings
    public function packing()
    {
        return $this->belongsTo(Packing::class);
    }
}