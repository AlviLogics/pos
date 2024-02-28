<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Packing;
use Illuminate\Http\Request;

class PackingController extends Controller
{
   /**
     * Display a listing of the packings.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sideMenu'] = 'packing';
        $packings = Packing::all();
        return view('packings.index', compact('packings', 'data'));
    }

    /**
     * Show the form for creating a new packing.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['sideMenu'] = 'packing';
        $products = Product::all(); // Add this line to fetch products
        return view('packings.create', compact('products', 'data'));
    }

    /**
     * Store a newly created packing in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'size' => 'required|string|max:255',
        ]);

        Packing::create($request->all());

        return redirect()->route('packings.index')->with('success', 'Packing created successfully');
    }

    /**
     * Display the specified packing.
     *
     * @param  \App\Models\Packing  $packing
     * @return \Illuminate\Http\Response
     */
    public function show(Packing $packing)
    {
        $data['sideMenu'] = 'packing';
        return view('packings.show', compact('packing', 'data'));
    }

    /**
     * Show the form for editing the specified packing.
     *
     * @param  \App\Models\Packing  $packing
     * @return \Illuminate\Http\Response
     */
    public function edit(Packing $packing)
    {
        $data['sideMenu'] = 'packing';
        $products = Product::all(); // Add this line to fetch products
        return view('packings.edit', compact('packing', 'products', 'data'));
    }

    /**
     * Update the specified packing in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Packing  $packing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Packing $packing)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'size' => 'required|string|max:255',
        ]);

        $packing->update($request->all());

        return redirect()->route('packings.index')->with('success', 'Packing updated successfully');
    }

    /**
     * Remove the specified packing from the database.
     *
     * @param  \App\Models\Packing  $packing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Packing $packing)
    {
        $packing->delete();

        return redirect()->route('packings.index')->with('success', 'Packing deleted successfully');
    }
}