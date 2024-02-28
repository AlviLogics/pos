<?php

namespace App\Http\Controllers;

use App\Models\Salesperson;
use Illuminate\Http\Request;
use App\Models\ChartOfAccount;

class SalespersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sideMenu'] = 'salespeople';
        $salespeople = Salesperson::all();
        return view('salespeople.index', compact('salespeople','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['sideMenu'] = 'salespeople';

        return view('salespeople.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);

        $saleperson = Salesperson::create($request->all());

        $openingBalanceAccount = ChartOfAccount::create([
            'code' => '2110',
            'name' => 'Accounts Receivable - '.$saleperson->name,
            'type' => 'assets',
            'description' => 'Opening balance',
        ]);
        // Create entry in the accounts for the opening balance
        Salesperson::where('id', $saleperson->id)->update(['chart_of_account_id'=>$openingBalanceAccount->id]);


        return redirect()->route('salespeople.index')
                         ->with('success', 'Salesperson created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['sideMenu'] = 'salespeople';
        $salesperson = Salesperson::findOrFail($id);
        return view('salespeople.show', compact('salesperson', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['sideMenu'] = 'salespeople';
        $salesperson = Salesperson::findOrFail($id);
        return view('salespeople.edit', compact('salesperson', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);

        $salesperson = Salesperson::findOrFail($id);
        $salesperson->update($request->all());

        return redirect()->route('salespeople.index')
                         ->with('success', 'Salesperson updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $salesperson = Salesperson::findOrFail($id);
        $salesperson->delete();

        return redirect()->route('salespeople.index')
                         ->with('success', 'Salesperson deleted successfully.');
    }
}