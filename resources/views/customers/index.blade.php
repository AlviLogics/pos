<!-- resources/views/customers/index.blade.php -->

@extends('admin.layouts.layout')

@section('content')
<main>
    <h1>Customers</h1>

    <a href="{{ route('customers.create') }}" class="btn btn-success">Create Customer</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>
                        <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @role('admin', 'web')
    I am a super-admin!
@else
    I am not a super-admin...
@endrole
    </main>
@endsection
