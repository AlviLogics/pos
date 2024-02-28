@extends('admin.layouts.layout')
@section('content')
<main>
    <h1>Salary Payments</h1>

    <a href="{{ route('salaries.create') }}" class="btn btn-success">Record Salary Payment</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Employee</th>
                <th>Amount</th>
                <th>Payment Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salaries as $salary)
                <tr>
                    <td>{{ $salary->id }}</td>
                    <td>{{ $salary->employee->name }}</td>
                    <td>{{ $salary->amount }}</td>
                    <td>{{ $salary->payment_date }}</td>
                    <td>
                        <a href="{{ route('salaries.show', $salary->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('salaries.edit', $salary->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>
@endsection
