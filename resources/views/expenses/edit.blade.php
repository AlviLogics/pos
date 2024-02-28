@extends('admin.layouts.layout')
@section('content')
<main>
    <h1>Edit Expense</h1>

    <form action="{{ route('expenses.update', $expense->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="employee_id">Employee:</label>
            <select name="employee_id" class="form-control" required>
                <option value="">Select Employee</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ $expense->employee_id == $employee->id ? 'selected' : '' }}>{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="number" name="amount" class="form-control" value="{{ $expense->amount }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control" required>{{ $expense->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update Expense</button>
    </form>
</main>
    @endsection
