<!-- resources/views/stocks/edit.blade.php -->

@extends('admin.layouts.layout')

@section('content')
<main>
    <h1>Edit Stock</h1>

    <form action="{{ route('stocks.update', $stock->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="packing_id">Product:</label>
            <select name="packing_id" class="form-control" required>
                @foreach($products as $product)
                    @foreach($product->packings as $packing)
                        <option value="{{ $packing->id }}" {{ $stock->packing_id == $packing->id ? 'selected' : '' }}>
                            {{ $product->name }} - {{ $packing->size }}
                        </option>
                    @endforeach
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="vendor_id">Vendor:</label>
            <select name="vendor_id" class="form-control" required>
                @foreach($vendors as $vendor)
                    <option value="{{ $vendor->id }}" {{ $stock->vendor_id == $vendor->id ? 'selected' : '' }}>
                        {{ $vendor->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="buy_price">Buy Price:</label>
            <input type="number" name="buy_price" class="form-control" value="{{ $stock->buy_price }}" required>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" class="form-control" value="{{ $stock->quantity }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update Stock</button>
    </form>
</main>
@endsection
