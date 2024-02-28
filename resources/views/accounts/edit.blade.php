@extends('admin.layouts.layout')
@section('content')
<main>

    <div class="container">
        <h2>Edit Account</h2>
        <form action="{{ route('accounts.update', $account->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $account->name }}">
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <select class="form-control" id="type" name="type">
                    <option value="asset" {{ $account->type == 'asset' ? 'selected' : '' }}>Asset</option>
                    <option value="liability" {{ $account->type == 'liability' ? 'selected' : '' }}>Liability</option>
                    <option value="equity" {{ $account->type == 'equity' ? 'selected' : '' }}>Equity</option>
                    <option value="revenue" {{ $account->type == 'revenue' ? 'selected' : '' }}>Revenue</option>
                    <option value="expense" {{ $account->type == 'expense' ? 'selected' : '' }}>Expense</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

</main>
@endsection
