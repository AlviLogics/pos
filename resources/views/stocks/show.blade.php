<!-- resources/views/stocks/show.blade.php -->

@extends('admin.layouts.layout')

@section('content')
<main>
    <h1>Stock Details</h1>

    <p><strong>ID:</strong> {{ $stock->id }}</p>
    <p><strong>Product:</strong> {{ $stock->packing->product->name }} - {{ $stock->packing->size }}</p>
    <p><strong>Vendor:</strong> {{ $stock->vendor->name }}</p>
    <p><strong>Buy Price:</strong> {{ $stock->buy_price }}</p>
    <p><strong>Quantity:</strong> {{ $stock->quantity }}</p>

    <!-- Add more details as needed -->

    <a href="{{ route('stocks.edit', $stock->id) }}" class="btn btn-warning">Edit Stock</a>
    <!-- Add a delete button if necessary -->
</main>
@endsection
