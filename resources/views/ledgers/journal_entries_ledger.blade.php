@extends('admin.layouts.layout')
@section('content')
<main>
<div class="container">
        <h1>Journal Entries Ledger</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Account</th>
                    <th>Debit</th>
                    <th>Credit</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($journalEntries as $entry)
                
                    <tr>
                        <td>{{ $entry->date }}</td>
                        <td>{{$entry->account_name }} </td> <!-- Assuming there's a relationship to the account -->
                        <td>@if($entry->type == 'debit'){{ $entry->amount }}  @else 0 @endif</td>
                        <td>@if($entry->type == 'credit') {{ $entry->amount }} @else 0  @endif</td>
                        <td>{{ $entry->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection
