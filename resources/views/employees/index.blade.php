@extends('admin.layouts.layout')
@section('content')
<main>
    <h1>Employees</h1>

    <a href="{{ route('employees.create') }}" class="btn btn-success">Create Employee</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Salary</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone ?: 'N/A' }}</td>
                    <td>{{ $employee->salary }}</td>
                    <td>
                        <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>
@endsection
