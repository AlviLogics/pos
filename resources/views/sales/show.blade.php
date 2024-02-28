@extends('admin.layouts.layout')
@section('content')
<main>
<h1>Sale Details</h1>

    <p><strong>ID:</strong> {{ $sale->id }}</p>
    <p><strong>Customer:</strong> {{ $sale->customer->name }}</p>
    <p><strong>Product:</strong> {{ $sale->product->name }}</p>
    <p><strong>Quantity:</strong> {{ $sale->quantity }}</p>
    <p><strong>Total Amount:</strong> {{ $sale->total_amount }}</p>
    <p><strong>Sale Date:</strong> {{ $sale->sale_date }}</p>

    <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-warning">Edit Sale</a>
    <!-- Add a delete button if necessary -->
</main>
@endsection
