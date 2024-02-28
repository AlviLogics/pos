<!-- resources/views/vendors/create.blade.php -->

@extends('admin.layouts.layout')

@section('content')
<main>
    <h1>Create Vendor</h1>

    <form action="{{ route('vendors.store') }}" method="POST">
        @csrf
        <div class="form-group">
        <label for="name">Vendor Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
        <label for="name">Opening Balance:</label>
            <input type="text" name="opening_balance" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Create Vendor</button>
    </form>
</main>
@endsection
