@extends('admin.layouts.layout')
@section('content')
<main>
    <h1>Employee Details</h1>

    <p><strong>ID:</strong> {{ $employee->id }}</p>
    <p><strong>Name:</strong> {{ $employee->name }}</p>
    <p><strong>Email:</strong> {{ $employee->email }}</p>
    <p><strong>Phone:</strong> {{ $employee->phone ?: 'N/A' }}</p>
    <p><strong>Salary:</strong> {{ $employee->salary }}</p>

    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">Edit Employee</a>
    <!-- Add a delete button if necessary -->
</main>
@endsection
