@extends('admin.layouts.layout')
@section('content')
<main>
<h1>Edit Salesperson</h1>

    <form action="{{ route('salespeople.update', $salesperson->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $salesperson->name }}" required>
        </div>
        <!-- Add more fields as needed -->
        <button type="submit" class="btn btn-success">Update Salesperson</button>
    </form>
</main>
@endsection
