@extends('admin.layouts.layout')
@section('content')
<main>
    <h1>Expense Details</h1>

    <p><strong>ID:</strong> {{ $expense->id }}</p>
    <p><strong>Employee:</strong> {{ $expense->employee->name }}</p>
    <p><strong>Amount:</strong> {{ $expense->amount }}</p>
    <p><strong>Description:</strong> {{ $expense->description }}</p>

    <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-warning">Edit Expense</a>
    <!-- Add a delete button if necessary -->
</main>
@endsection
