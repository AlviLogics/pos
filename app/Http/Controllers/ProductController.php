<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Display a listing of the products
    public function index()
    {
        $data['sideMenu'] = 'product';
        $products = Product::all();
        return view('products.index', compact('products', 'data'));
    }

    // Show the form for creating a new product
    public function create()
    {
        $data['sideMenu'] = 'product';
        return view('products.create', compact('data'));
    }

    // Store a newly created product in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    // Display the specified product
    public function show(Product $product)
    {
        $data['sideMenu'] = 'product';
        return view('products.show', compact('product', 'data'));
    }

    // Show the form for editing the specified product
    public function edit(Product $product)
    {
        $data['sideMenu'] = 'product';
        return view('products.edit', compact('product', 'data'));
    }

    // Update the specified product in the database
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    // Remove the specified product from the database
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
