@extends('admin.layouts.layout')
@section('content')
<main>
<h1>Purchases</h1>

<a href="{{ route('purchases.create') }}" class="btn btn-success">Create Purchases</a>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Purchases</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Bill Number</th>
                                    <th>Particular</th>
                                    <th>Quantity</th>
                                    <th>Rate</th>
                                    <th>Total</th>
                                    <!-- Add more columns as needed -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchases as $purchase)
                                    <tr>
                                        <td>{{ $purchase->date }}</td>
                                        <td>{{ $purchase->bill_number }}</td>
                                        <td>{{ $purchase->particular }}</td>
                                        <td>{{ $purchase->quantity }}</td>
                                        <td>{{ $purchase->rate }}</td>
                                        <td>{{ $purchase->quantity * $purchase->rate }}</td>
                                        <!-- Add more columns as needed -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection
