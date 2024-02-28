<?php

namespace App\Http\Controllers;
use App\Models\Vendor;
use App\Models\Payment;
use App\Models\ChartOfAccount;
use App\Models\JournalEntry;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $data['sideMenu'] = 'payment';
        $vendors = Vendor::all();
        return view('payments.index', compact('vendors', 'data'));
    }

    /**
     * Show the form for creating a new vendor.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['sideMenu'] = 'payment';
        $vendors = Vendor::all();
        return view('payments.create', compact('vendors','data'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'vendor_id' => 'required|exists:vendors,id',
            'amount' => 'required|numeric|min:0',
            // Other validation rules for payment method, date, etc.
        ]);

        // Record the payment
        $payment = Payment::create([
            'vendor_id' => $request->input('vendor_id'),
            'amount' => $request->input('amount'),
            'payment_method' => $request->input('payment_method'), // Assuming you have a payment method field
            'date' => now(),
        ]);
        $cashAccount = ChartOfAccount::where('name', 'Cash')->firstOrFail();
        $accountsPayableAccount = $payment->vendor->account; // Assuming vendor has an account relationship
        
        // Update vendor's credit balance
        $vendor = Vendor::find($request->input('vendor_id'));
        $vendor->opening_balance -= $request->input('amount');
        $vendor->save();

        // Record transaction in journal
        JournalEntry::create([
            'date' => now(),
            'chart_of_account_id' => $cashAccount->id, // ID of the cash account
            'amount' => $request->input('amount'),
            'type' => 'credit',
            'description' => 'Payment made to vendor from Cash to: ' . $vendor->name,
        ]);

        JournalEntry::create([
            'date' => now(),
            'chart_of_account_id' => $accountsPayableAccount->id, // ID of the accounts payable account
            'amount' => $request->input('amount'),
            'type' => 'debit',
            'description' => $vendor->name,
        ]);

        // Redirect or return response indicating success
        return redirect()->route('payments.index')->with('success', 'Payment recorded successfully.');
    }
}
