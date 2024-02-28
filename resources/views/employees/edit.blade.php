@extends('admin.layouts.layout')
@section('content')
<main>
    <h1>Edit Employee</h1>
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $employee->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" value="{{ $employee->email }}">
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" name="phone" class="form-control" value="{{ $employee->phone }}">
        </div>
        <div class="form-group">
            <label for="salary">Salary:</label>
            <input type="number" name="salary" class="form-control" value="{{ $employee->salary }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update Employee</button>
    </form>
</main>
@endsection
