<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packing extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'size'];

    // Define the relationship with Products
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Define the relationship with Stocks
    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    // Define the relationship with Sales
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
