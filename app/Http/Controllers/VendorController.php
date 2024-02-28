<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\ChartOfAccount;
use App\Models\JournalEntry;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
//use DB;

class VendorController extends Controller
{
    /**
     * Display a listing of the vendors.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sideMenu'] = 'vendor';
        $vendors = Vendor::all();

        $superAdminCount = Admin::with('roles')->get()->filter(
            fn ($user) => $user->roles->where('name', 'admin')->toArray()
        )->count();
        $all_users_with_all_their_roles = Admin::with('roles')->get();

        //dd($all_users_with_all_their_roles);

        return view('vendors.index', compact('vendors', 'data'));
    }

    /**
     * Show the form for creating a new vendor.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['sideMenu'] = 'vendor';
        return view('vendors.create', compact('data'));
    }

    /**
     * Store a newly created vendor in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'opening_balance' => 'required|numeric|min:0',
        ]);
        //DB::beginTransaction();

            //Vendor::create($request->all());
                // Create the vendor
                $vendor = Vendor::create([
                    'name' => $request->input('name'),
                    'opening_balance' => $request->input('opening_balance'),
                ]);

                // Create entry in the accounts for the opening balance
                //$openingBalanceAccount = ChartOfAccount::where('name', 'Accounts Payable - '.$vendor->name)->where('type', 'liabilities')->firstOrFail();
                $openingBalanceAccount = ChartOfAccount::create([
                    'code' => '2110',
                    'name' => 'Accounts Payable - '.$vendor->name,
                    'type' => 'liabilities',
                    'description' => 'Opening balance',
                ]);
                // Create entry in the accounts for the opening balance
                Vendor::where('id', $vendor->id)->update(['chart_of_account_id'=>$openingBalanceAccount->id]);

                // Debit or credit the appropriate account based on your accounting practices
                $amount = $request->input('opening_balance');
                $type = $amount >= 0 ? 'credit' : 'debit';

                // 19-02-2024 afzal ny del karwa di
                // JournalEntry::create([
                //     'date' => now(),
                //     'chart_of_account_id' => $openingBalanceAccount->id,
                //     'amount' => abs($amount),
                //     'type' => $type,
                //     'description' => 'Opening balance for ' . $vendor->name,
                // ]);
       

        return redirect()->route('vendors.index')->with('success', 'Vendor created successfully');
    }

    /**
     * Display the specified vendor.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        $data['sideMenu'] = 'vendor';
        return view('vendors.show', compact('vendor', 'data'));
    }

    /**
     * Show the form for editing the specified vendor.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        $data['sideMenu'] = 'vendor';
        return view('vendors.edit', compact('vendor', 'data'));
    }

    /**
     * Update the specified vendor in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $vendor->update($request->all());

        return redirect()->route('vendors.index')->with('success', 'Vendor updated successfully');
    }

    /**
     * Remove the specified vendor from the database.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        $vendor->delete();

        return redirect()->route('vendors.index')->with('success', 'Vendor deleted successfully');
    }
}
