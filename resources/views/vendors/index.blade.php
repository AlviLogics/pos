<!-- resources/views/vendors/index.blade.php -->

@extends('admin.layouts.layout')

@section('content')
<main>
    <h1>Vendors</h1>

    <a href="{{ route('vendors.create') }}" class="btn btn-success">Create Cendor</a>

    <table class="table mt-3">
        <thead>
            <tr>
            <th>ID</th>
                <th>Name</th>
                <th>Opening</th>
                <th>Balance</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vendors as $vendor)
                <tr>
                    <td>{{ $vendor->id }}</td>
                    <td>{{ $vendor->name }}</td>
                    <td>{{ $vendor->opening_balance }}</td>
                    <td>{{ $vendor->opening_balance }}</td>
                    <td>
                        <a href="{{ route('ledger.vendor', ['vendorId' => $vendor->id]) }}" class="btn btn-info"> View Ledger</a>
                        <a href="{{ route('vendors.show', $vendor->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('vendors.edit', $vendor->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>
@endsection
