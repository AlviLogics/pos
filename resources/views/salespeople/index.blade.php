@extends('admin.layouts.layout')
@section('content')
<main>
<h1>Salespeople</h1>

    <a href="{{ route('salespeople.create') }}" class="btn btn-success">Add Salesperson</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salespeople as $salesperson)
                <tr>
                    <td>{{ $salesperson->id }}</td>
                    <td>{{ $salesperson->name }}</td>
                    <td>
                        <a href="{{ route('salespeople.show', $salesperson->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('salespeople.edit', $salesperson->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('salespeople.destroy', $salesperson->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this salesperson?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</main>
@endsection
