<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;
use App\Models\Customer;
use Illuminate\Http\Request;
use Auth;

class CustomersController extends Controller
{
    /**
     * Display a listing of the customers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sideMenu'] = 'customer';
        $customers = Customer::all();
        $user = Auth::guard('admin')->user();
        
            // Define a `publish articles` permission for the admin users belonging to the admin guard
    //$permission = Permission::create(['guard_name' => 'admin', 'name' => 'publish articles']);

    // Define a *different* `publish articles` permission for the regular users belonging to the web guard
    //$permission = Permission::create(['guard_name' => 'web', 'name' => 'publish articles']);
    //$user->hasPermissionTo('Product access', 'admin');
      //  $user->hasPermissionTo('Salary access', 'admin');
      
        return view('customers.index', compact('customers', 'data'));
    }

    /**
     * Show the form for creating a new customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['sideMenu'] = 'customer';
        return view('customers.create',compact('data'));
    }

    /**
     * Store a newly created customer in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:customers,email',
            'phone' => 'nullable|string|max:20',
            // Add other validation rules as needed
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer created successfully');
    }

    /**
     * Display the specified customer.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $data['sideMenu'] = 'customer';
        return view('customers.show', compact('customer', 'data'));
    }

    /**
     * Show the form for editing the specified customer.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $data['sideMenu'] = 'customer';
        return view('customers.edit', compact('customer', 'data'));
    }

    /**
     * Update the specified customer in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:customers,email,' . $customer->id,
            'phone' => 'nullable|string|max:20',
            // Add other validation rules as needed
        ]);

        $customer->update($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully');
    }

    /**
     * Remove the specified customer from the database.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully');
    }
}