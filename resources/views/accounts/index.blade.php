@extends('admin.layouts.layout')
@section('content')
<main>
    <div class="container">
        <h2>Accounts</h2>
        <a href="{{ route('accounts.create') }}" class="btn btn-primary mb-2">Create Account</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($accounts as $account)
                    <tr>
                        <td>{{ $account->id }}</td>
                        <td>{{ $account->name }}</td>
                        <td>{{ $account->type }}</td>
                        <td>
                            <a href="{{ route('accounts.edit', $account->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('accounts.destroy', $account->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</main>
@endsection
