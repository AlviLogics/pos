<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalEntry extends Model
{
    use HasFactory;
    protected $table = 'journal_entries';

    protected $fillable = [
        'date', 'chart_of_account_id', 'amount', 'type', 'description',
    ];

    public function account()
    {
        return $this->belongsTo(ChartOfAccount::class);
    }
}
