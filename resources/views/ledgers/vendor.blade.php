@extends('admin.layouts.layout')
@section('content')
<main>

<div class="container">
        <h2>Ledger for Vendor:{{ $vendor->name }}</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Debit</th>
                    <th>Credit</th>
                    <th>Balance</th>
                </tr>
            </thead>
            <tbody>
                {{-- Loop through ledger entries --}}
                @php $balance = 0; @endphp
                @foreach($ledgerEntries as $entry)
                    <tr>
                        <td>{{ $entry->date }}</td>
                        <td>{{ $entry->description }}</td>
                        <td>@if($entry->type == 'credit') {{$balance +=  $entry->amount;}} @else 0  @endif</td>
                        <td>@if($entry->type == 'debit') {{$balance -= $entry->amount;}}  @else 0 @endif</td>
                        <td>{{ $balance }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection
