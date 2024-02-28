<!-- resources/views/packings/create.blade.php -->

@extends('admin.layouts.layout')

@section('content')
<main>
    <h1>Create Packing</h1>

    <form action="{{ route('packings.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="product_id">Product:</label>
            <select name="product_id" class="form-control" required>
                <option value="0">Select</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="size">Size:</label>
            <input type="text" name="size" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Create Packing</button>
    </form>
</main>
@endsection
