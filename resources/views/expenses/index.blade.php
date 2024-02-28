@extends('admin.layouts.layout')
@section('content')
<main>
    <h1>Expenses</h1>

    <a href="{{ route('expenses.create') }}" class="btn btn-success">Create Expense</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Employee</th>
                <th>Amount</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($expenses as $expense)
                <tr>
                    <td>{{ $expense->id }}</td>
                    <td>{{ $expense->employee->name }}</td>
                    <td>{{ $expense->amount }}</td>
                    <td>{{ $expense->description }}</td>
                    <td>
                        <a href="{{ route('expenses.show', $expense->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>
@endsection
