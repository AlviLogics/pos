<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'packing_id' ,'quantity',
    ];

    /**
     * Get the purchases associated with the stock item.
     */
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
