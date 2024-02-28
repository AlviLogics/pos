@extends('admin.layouts.layout')
@section('content')
<main>
    <h1>Record Salary Payment</h1>

    <form action="{{ route('salaries.store') }}" method="POST">
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
            <label for="payment_date">Payment Date:</label>
            <input type="date" name="payment_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Record Payment</button>
    </form>
</main>
@endsection
