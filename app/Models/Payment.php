<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ['vendor_id', 'amount', 'payment_method', 'date'];
    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
}
