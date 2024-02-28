<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    // Define the relationship with Packings
    public function packings()
    {
        return $this->hasMany(Packing::class);
    }

    // Define the relationship with Offers
    public function offers()
    {
        return $this->hasOne(Offer::class);
    }

    // Define the relationship with Sales
    public function sales()
    {
        return $this->hasManyThrough(Sale::class, Packing::class);
    }
}
