<!-- resources/views/products/create.blade.php -->

@extends('admin.layouts.layout')

@section('content')
<main>
    <h1>Create Product</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Product Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Create Product</button>
    </form>
</main>
@endsection
