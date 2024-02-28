<!-- resources/views/vendors/edit.blade.php -->

@extends('admin.layouts.layout')

@section('content')
<main>
    <h1>Edit vendor</h1>

    <form action="{{ route('vendors.update', $vendor->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">vendor Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $vendor->name }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update vendor</button>
    </form>
</main>
@endsection
