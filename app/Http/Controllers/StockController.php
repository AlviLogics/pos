<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the stocks.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sideMenu'] = 'stock';
        $stocks = Stock::all();
        return view('stocks.index', compact('stocks', 'data'));
    }

    /**
     * Show the form for creating a new stock.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['sideMenu'] = 'stock';
        // You may need to fetch additional data, e.g., products and vendors, to populate dropdowns
        $products = \App\Models\Product::all();
        $vendors = \App\Models\Vendor::all();

        return view('stocks.create', compact('products', 'vendors', 'data'));
    }

    /**
     * Store a newly created stock in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'packing_id' => 'required|exists:packings,id',
            'vendor_id' => 'required|exists:vendors,id',
            'buy_price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        Stock::create($request->all());

        return redirect()->route('stocks.index')->with('success', 'Stock created successfully');
    }

    /**
     * Display the specified stock.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        $data['sideMenu'] = 'stock';
        return view('stocks.show', compact('stock'));
    }

    /**
     * Show the form for editing the specified stock.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        $data['sideMenu'] = 'stock';
        // You may need to fetch additional data, e.g., products and vendors, to populate dropdowns
        $products = \App\Models\Product::all();
        $vendors = \App\Models\Vendor::all();

        return view('stocks.edit', compact('stock', 'products', 'vendors', 'data'));
    }

    /**
     * Update the specified stock in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        $request->validate([
            'packing_id' => 'required|exists:packings,id',
            'vendor_id' => 'required|exists:vendors,id',
            'buy_price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        $stock->update($request->all());

        return redirect()->route('stocks.index')->with('success', 'Stock updated successfully');
    }

    /**
     * Remove the specified stock from the database.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        $stock->delete();

        return redirect()->route('stocks.index')->with('success', 'Stock deleted successfully');
    }
}