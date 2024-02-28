@extends('admin.layouts.layout')
@section('content')
<main>
    <h1>Create Expense</h1>

    <form action="{{ route('expenses.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="employee_id">Employee:</label>
            <select name="employee_id" class="form-control" required>
                <option value="">Select Employee</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="number" name="amount" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Create Expense</button>
    </form>
</main>
@endsection
