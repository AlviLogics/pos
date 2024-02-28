<!-- resources/views/products/edit.blade.php -->

@extends('admin.layouts.layout')

@section('content')
<main>
    <h1>Edit Product</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Product Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update Product</button>
    </form>
</main>    
@endsection
