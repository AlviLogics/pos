<!-- resources/views/vendors/show.blade.php -->

@extends('admin.layouts.layout')

@section('content')
<main>
    <h1>Vendor Details</h1>

    <p><strong>ID:</strong> {{ $vendor->id }}</p>
    <p><strong>Name:</strong> {{ $vendor->name }}</p>

    <!-- Add more details as needed -->

    <a href="{{ route('vendors.edit', $vendor->id) }}" class="btn btn-warning">Edit Vendor</a>
    <!-- Add a delete button if necessary -->
</main>
@endsection
