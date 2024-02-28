<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $fillable = [ 'name','chart_of_account_id' ,'opening_balance' ];

    public function account()
    {
        return $this->belongsTo(ChartOfAccount::class, 'chart_of_account_id');
    }
    public function ledgerEntries()
    {
        return $this->hasMany(JournalEntry::class);
    }
}
