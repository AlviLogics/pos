<!-- resources/views/products/show.blade.php -->

@extends('admin.layouts.layout')

@section('content')
<main>
    <h1>Product Details</h1>

    <p><strong>ID:</strong> {{ $product->id }}</p>
    <p><strong>Name:</strong> {{ $product->name }}</p>

    <!-- Add more details as needed -->

    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit Product</a>
    <!-- Add a delete button if necessary -->
</main>
@endsection
