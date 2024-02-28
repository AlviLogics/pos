<!-- resources/views/stocks/index.blade.php -->

@extends('admin.layouts.layout')

@section('content')
<main>
    <h1>Stocks</h1>



    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Vendor</th>
                <th>Buy Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stocks as $stock)
                <tr>
                    <td>{{ $stock->id }}</td>
                    <td>{{ $stock->packing->product->name }}</td>
                    <td>{{ $stock->vendor->name }}</td>
                    <td>{{ $stock->buy_price }}</td>
                    <td>{{ $stock->quantity }}</td>
                    <td>{{ $stock->buy_price * $stock->quantity }}</td>
                    <td>
                        <a href="{{ route('stocks.show', $stock->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('stocks.edit', $stock->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>
@endsection
