@extends('admin.layouts.layout')
@section('content')
<main>
    <h1>Salary Payment Details</h1>

    <p><strong>ID:</strong> {{ $salary->id }}</p>
    <p><strong>Employee:</strong> {{ $salary->employee->name }}</p>
    <p><strong>Amount:</strong> {{ $salary->amount }}</p>
    <p><strong>Payment Date:</strong> {{ $salary->payment_date }}</p>

    <a href="{{ route('salaries.edit', $salary->id) }}" class="btn btn-warning">Edit Salary Payment</a>
    <!-- Add a delete button if necessary -->
</main>
@endsection
