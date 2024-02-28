<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Employee;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the expenses.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sideMenu'] = 'expense';
        $expenses = Expense::all();
        return view('expenses.index', compact('expenses', 'data'));
    }

    /**
     * Show the form for creating a new expense.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['sideMenu'] = 'expense';
        $employees = Employee::all();
        return view('expenses.create', compact('employees','data'));
    }

    /**
     * Store a newly created expense in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'amount' => 'required|numeric',
            'description' => 'required|string',
            // Add other validation rules as needed
        ]);

        Expense::create($request->all());

        return redirect()->route('expenses.index')->with('success', 'Expense created successfully');
    }

    /**
     * Display the specified expense.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        $data['sideMenu'] = 'expense';
        return view('expenses.show', compact('expense', 'data'));
    }

    /**
     * Show the form for editing the specified expense.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        $data['sideMenu'] = 'expense';
        return view('expenses.edit', compact('expense', 'data'));
    }

    /**
     * Update the specified expense in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'amount' => 'required|numeric',
            'description' => 'required|string',
            // Add other validation rules as needed
        ]);

        $expense->update($request->all());

        return redirect()->route('expenses.index')->with('success', 'Expense updated successfully');
    }

    /**
     * Remove the specified expense from the database.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();

        return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully');
    }
}