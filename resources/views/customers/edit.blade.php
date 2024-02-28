<!-- resources/views/customers/edit.blade.php -->

@extends('admin.layouts.layout')

@section('content')
<main>
    <h1>Edit Customer</h1>

    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $customer->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" value="{{ $customer->email }}">
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" name="phone" class="form-control" value="{{ $customer->phone }}">
        </div>
        <button type="submit" class="btn btn-success">Update Customer</button>
    </form>
</main>
@endsection
