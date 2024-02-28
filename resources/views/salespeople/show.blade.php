@extends('admin.layouts.layout')
@section('content')
<main>
<h1>Salesperson Details</h1>

    <p><strong>ID:</strong> {{ $salesperson->id }}</p>
    <p><strong>Name:</strong> {{ $salesperson->name }}</p>
    <!-- Add more details as needed -->

    <a href="{{ route('salespeople.edit', $salesperson->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('salespeople.destroy', $salesperson->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this salesperson?')">Delete</button>
    </form>
</main>
@endsection
