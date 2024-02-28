<!-- resources/views/packings/edit.blade.php -->

@extends('admin.layouts.layout')

@section('content')
<main>
    <h1>Edit Packing</h1>

    <form action="{{ route('packings.update', $packing->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="product_id">Product:</label>
            <select name="product_id" class="form-control" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ $packing->product_id == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="size">Size:</label>
            <input type="text" name="size" class="form-control" value="{{ $packing->size }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update Packing</button>
    </form>
</main>
@endsection
