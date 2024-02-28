<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'salary',
        // Add other fields as needed
    ];

    // Define relationships
    public function expenses()
    {
        return $this->hasMany(EmployeeExpense::class);
    }
    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }
}
