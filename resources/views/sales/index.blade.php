@extends('admin.layouts.layout')
@section('content')
<main>
<h1>Sales Records</h1>

    <a href="{{ route('sales.create') }}" class="btn btn-success">Record Sale</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Product</th>
                <th>Rate</th>
                <th>Quantity</th>
                <th>Total Amount</th>
                <th>Sale Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td></td>
                    <td>{{ $sale->packing->product->name }} - {{ $sale->packing->size }}</td>
                    <td>{{ $sale->rate }}</td>
                    <td>{{ $sale->quantity }}</td>
                    <td>{{ $sale->total_amount }}</td>
                    <td>{{ $sale->sale_date }}</td>
                    <td>
                        <a href="{{ route('sales.show', $sale->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</main>
@endsection
