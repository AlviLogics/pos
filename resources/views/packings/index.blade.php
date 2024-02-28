<!-- resources/views/packings/index.blade.php -->

@extends('admin.layouts.layout')

@section('content')
<main>
    <h1>Packings</h1>

    <a href="{{ route('packings.create') }}" class="btn btn-success">Create Packing</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Size</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($packings as $packing)
                <tr>
                    <td>{{ $packing->id }}</td>
                    <td>{{ $packing->product->name }}</td>
                    <td>{{ $packing->size }}</td>
                    <td>
                        <a href="{{ route('packings.show', $packing->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('packings.edit', $packing->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>
    @endsection
