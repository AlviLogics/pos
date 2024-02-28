@extends('admin.layouts.layout')
@section('content')
<main>

<h1>Edit Sale</h1>

    <form action="{{ route('sales.update', $sale->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="customer_id">Customer:</label>
            <select name="customer_id" class="form-control" required>
                <option value="">Select Customer</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $sale->customer_id == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="product_id">Product:</label>
            <select name="product_id" class="form-control" required>
                <option value="">Select Product</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ $sale->product_id == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" class="form-control" value="{{ $sale->quantity }}" required>
        </div>
        <div class="form-group">
            <label for="total_amount">Total Amount:</label>
            <input type="number" name="total_amount" class="form-control" value="{{ $sale->total_amount }}" required>
        </div>
        <div class="form-group">
            <label for="sale_date">Sale Date:</label>
            <input type="date" name="sale_date" class="form-control" value="{{ $sale->sale_date }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update Sale</button>
    </form>
</main>
@endsection
