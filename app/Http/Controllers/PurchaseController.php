<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\Packing;
use App\Models\Purchase;
use App\Models\ChartOfAccount;
use App\Models\JournalEntry;
use App\Models\Stock;
use App\Models\StockItem;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['sideMenu'] = 'purchase';
        $purchases = Purchase::latest()->get();
        $purchases = Purchase::latest()->get();

        return view('purchases.index', compact('purchases', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['sideMenu'] = 'purchase';
        $vendors = Vendor::all();
        $packings = Packing::latest()->get();
        return view('purchases.create', compact('vendors', 'packings', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'packing_id' => 'required',
            'vendor_id' => 'required',
            'bill_number' => 'required|string',
            'particular' => 'required|string',
            'quantity' => 'required|numeric|min:1',
            'rate' => 'required|numeric|min:0',
            // Add more validation rules as needed
        ]);

        $validatedData['debit']=$validatedData['rate'] * $validatedData['quantity'];
        $validatedData['credit']=0;
        $validatedData['balance']=0;
        //$validatedData['packing_id']=$request->packing_id;
        $validatedData['particular']=$request->packing_id .' - '. $request->particular;
        // Create purchase record
        $purchase = Purchase::create($validatedData);
    
        // Record journal entries
        $inventoryAccount = ChartOfAccount::where('name', 'Inventory')->firstOrFail();
        $vendorAccount = $purchase->vendor->account; // Assuming vendor has an account relationship

        //dd($vendorAccount);
        $debitAmount = $purchase->quantity * $purchase->rate;

        // Update vendor's credit balance
        $vendor = Vendor::find($request->input('vendor_id'));
        $vendor->opening_balance += $debitAmount;
        $vendor->save();
    
        JournalEntry::create([
            'date' => $purchase->date,
            'chart_of_account_id' => $inventoryAccount->id,
            'amount' => $debitAmount,
            'type' => 'debit',
            'description' => 'Inventory: ' . $purchase->particular,
        ]);
    
        JournalEntry::create([
            'date' => $purchase->date,
            'chart_of_account_id' => $vendorAccount->id,
            'amount' => $debitAmount,
            'type' => 'credit',
            'description' => $vendor->name,
        ]);
    
        Stock::create([
            //'date' => $purchase->date,
            'packing_id' => $request->packing_id,
            'vendor_id' => $request->vendor_id,
            'rate' => $request->rate,
            'quantity' => $request->quantity,
            'total' => ($request->rate * $request->quantity),
            'type' => 'debit',
        ]);

        // Update stock quantity
        $stockItem = StockItem::firstOrCreate(['name' => $request->packing_id, 'packing_id' => $request->packing_id]);
        $stockItem->quantity += $purchase->quantity;
        $stockItem->save();
    

        // Redirect back with success message
        return redirect()->route('purchases.index')->with('success', 'Purchase recorded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
    public function showForm()
    {
        $data['sideMenu'] = 'account';
        $vendors = Vendor::all();
        return view('purchases.create', compact('vendors','data'));
    }
}
