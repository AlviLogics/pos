<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Employee;

use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['sideMenu'] = 'salaries';
        $salaries = Salary::all();
        return view('salaries.index', compact('salaries', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['sideMenu'] = 'salaries';
        $employees = Employee::all(); // Fetch all employees to populate the dropdown
        return view('salaries.create', compact('employees', 'data'));
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
        ]);

        // Create a new salary payment
        Salary::create($request->all());

        // Redirect back to the index page with a success message
        return redirect()->route('salaries.index')->with('success', 'Salary payment recorded successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Salary $salary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Salary $salary)
    {
        $data['sideMenu'] = 'salaries';
        $salary = Salary::findOrFail($salary->id);
        $employees = Employee::all(); // Fetch all employees to populate the dropdown
        return view('salaries.edit', compact('salary', 'employees', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Salary $salary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salary $salary)
    {
        //
    }
}
