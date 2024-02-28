@extends('admin.layouts.layout')
@section('content')
<main>

<div class="container">
        <h2>Ledger for Vendor:{{ $vendor->name }}</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Bill No</th>
                    <th>Particular</th>
                    <th>Qty</th>
                    <th>Rate</th>
                    <th>Debit</th>
                    <th>Credit</th>
                    <th>Balance</th>
                </tr>
            </thead>
            <tbody>
                {{-- Loop through ledger entries --}}
                @foreach($ledgerEntries as $entry)
                    <tr>
                        <td>{{ $entry->date }}</td>
                        <td>{{ $entry->bill_no }}</td>
                        <td>{{ $entry->particular }}</td>
                        <td>{{ $entry->qty }}</td>
                        <td>{{ $entry->rate }}</td>
                        <td>{{ $entry->debit }}</td>
                        <td>{{ $entry->credit }}</td>
                        <td>{{ $entry->balance }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection
