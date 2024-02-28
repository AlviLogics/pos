@extends('admin.layouts.layout')
@section('content')
<main>

<h1>Add Salesperson</h1>

    <form action="{{ route('salespeople.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <!-- Add more fields as needed -->
        <button type="submit" class="btn btn-success">Add Salesperson</button>
    </form>
</main>
@endsection
