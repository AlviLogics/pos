<!-- resources/views/stocks/create.blade.php -->

@extends('admin.layouts.layout')

@section('content')
<main>
    <h1>Create Stock</h1>

    <form action="{{ route('stocks.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="packing_id">Product:</label>
            <select name="packing_id" class="form-control" required>
                @foreach($products as $product)
                    @foreach($product->packings as $packing)
                        <option value="{{ $packing->id }}">{{ $product->name }} - {{ $packing->size }}</option>
                    @endforeach
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="vendor_id">Vendor:</label>
            <select name="vendor_id" class="form-control" required>
                @foreach($vendors as $vendor)
                    <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="buy_price">Buy Price:</label>
            <input type="number" name="buy_price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Create Stock</button>
    </form>
</main>
@endsection
