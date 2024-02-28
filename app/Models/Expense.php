<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'amount',
        'description',
        // Add other fields as needed
    ];

    // Define relationships
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
