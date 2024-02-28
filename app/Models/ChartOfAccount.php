<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChartOfAccount extends Model
{
    use HasFactory;
    protected $fillable = [
        'code', 'name','type', // Add more fields as needed
    ];

    public function vendors()
    {
        return $this->hasMany(Vendor::class);
    }
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
    public function account()
    {
        return $this->belongsTo(ChartOfAccount::class);
    }
    public function ledgerEntries()
    {
        return $this->hasMany(JournalEntry::class);
    }

}
