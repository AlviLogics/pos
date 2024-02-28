<!-- resources/views/packings/show.blade.php -->

@extends('admin.layouts.layout')

@section('content')
<main>
    <h1>Packing Details</h1>

    <p><strong>ID:</strong> {{ $packing->id }}</p>
    <p><strong>Product:</strong> {{ $packing->product->name }}</p>
    <p><strong>Size:</strong> {{ $packing->size }}</p>

    <!-- Add more details as needed -->

    <a href="{{ route('packings.edit', $packing->id) }}" class="btn btn-warning">Edit Packing</a>
    <!-- Add a delete button if necessary -->
</main>
@endsection
