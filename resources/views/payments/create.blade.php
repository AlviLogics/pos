@extends('admin.layouts.layout')
@section('content')
<main>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Make Payment</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('payments.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="date">Date:</label>
                                <input type="date" name="date" id="date" class="form-control"  value="{{ date('Y-m-d') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="vendor_id">Vendor:</label>
                                <select name="vendor_id" id="vendor_id" class="form-control" required>
                                    @foreach ($vendors as $vendor)
                                        <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="amount">Amount:</label>
                                <input type="number" name="amount" id="amount" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="payment_method">Payment Method:</label>
                                <input type="text" name="payment_method" id="payment_method" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Make Payment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection
