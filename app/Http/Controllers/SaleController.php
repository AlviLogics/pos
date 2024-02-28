<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Salesperson;
use App\Models\ChartOfAccount;
use App\Models\JournalEntry;
use App\Models\Stock;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['sideMenu'] = 'sale';
        $sales = Sale::all();
        $stocks = Stock::all();
        return view('sales.index', compact('sales', 'stocks', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['sideMenu'] = 'sale';
        $customers = Customer::all();
        $salespersons = Salesperson::all();
        $products = Product::all();
        $stocks = Stock::all();
        return view('sales.create', compact('customers', 'stocks' ,'products', 'salespersons', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'packing_id' => 'required|exists:packings,id',
            'quantity' => 'required|numeric',
            'total_amount' => 'required|numeric',
            'sale_date' => 'required|date',
        ]);

        // Create a new sale record
        if($request->saleperson_id != ''){
            $request['sale_to_id'] = $request->saleperson_id;  
            $request['sale_type'] = 'saleperson';  

            $saleperson = Salesperson::where('id', $request->saleperson_id)->firstOrFail();
            $cashAccount = ChartOfAccount::where('name', 'Inventory')->firstOrFail();
            $accountsPayableAccount = $saleperson->account; // Assuming vendor has an account relationship
            $accountsPayableAccount = $accountsPayableAccount->id;
        }else{
            $request['sale_to_id'] = $request->customer_id;  
            $request['sale_type'] = 'customer';  

            $cashAccount = ChartOfAccount::where('name', 'Inventory')->firstOrFail();
            $accountsPayableAccount = $cashAccount->id; // Assuming vendor has an account relationship
        }

        Sale::create($request->all());
 
        Stock::create([
            //'date' => $purchase->date,
            'packing_id' => $request->packing_id,
            //'vendor_id' => $request->vendor_id,
            'rate' => $request->rate,
            'quantity' => $request->quantity,
            'total' => ($request->rate * $request->quantity),
            'type' => 'credit',
        ]);
        
        
        // Update vendor's credit balance
        // $vendor = Vendor::find($request->input('vendor_id'));
        // $vendor->opening_balance -= $request->input('amount');
        // $vendor->save();

        // Record transaction in journal
        JournalEntry::create([
            'date' => now(),
            'chart_of_account_id' => $cashAccount->id, // ID of the cash account
            'amount' => $request->input('total_amount'),
            'type' => 'credit',
            'description' => 'Sale to : ' ,
        ]);

        JournalEntry::create([
            'date' => now(),
            'chart_of_account_id' => $accountsPayableAccount, // ID of the accounts payable account
            'amount' => $request->input('total_amount'),
            'type' => 'debit',
//            'description' => $saleperson->name,
            'description' => 'Cash',
        ]);

        // Redirect back to the index page with a success message
        return redirect()->route('sales.index')->with('success', 'Sale recorded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        $data['sideMenu'] = 'sale';
        $sale = Sale::findOrFail($sale->id);
        return view('show.sale', compact('sale', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        $data['sideMenu'] = 'sale';
        $sale = Sale::findOrFail($id);
        $customers = Customer::all();
        $products = Product::all();
        return view('sales.edit', compact('sale', 'customers', 'products', 'data'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
