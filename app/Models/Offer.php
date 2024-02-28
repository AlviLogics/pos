<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'buy_quantity', 'free_quantity'];

    // Define the relationship with Products
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}