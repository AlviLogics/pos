<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'customer_type',
        // Add other fields as needed
    ];
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
