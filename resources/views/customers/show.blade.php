<!-- resources/views/customers/show.blade.php -->

@extends('admin.layouts.layout')

@section('content')
<main>
    <h1>Customer Details</h1>

    <p><strong>ID:</strong> {{ $customer->id }}</p>
    <p><strong>Name:</strong> {{ $customer->name }}</p>
    <p><strong>Email:</strong> {{ $customer->email }}</p>
    <p><strong>Phone:</strong> {{ $customer->phone ?: 'N/A' }}</p>

    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning">Edit Customer</a>
    <!-- Add a delete button if necessary -->
</main>
@endsection
