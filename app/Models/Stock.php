<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = [
        'packing_id',
        'vendor_id',
        'rate',
        'quantity',
        'total',
        'type',
        // Add other fields as needed
    ];
    public function packing()
    {
        return $this->belongsTo(Packing::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
