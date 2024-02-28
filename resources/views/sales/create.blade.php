@extends('admin.layouts.layout')
@section('content')
<main>

<h1>Record Sale</h1>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                        @endif
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{session('message')}}
                            </div>
                        @endif
    <form action="{{ route('sales.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="sale_date">Sale Date:</label>
            <input type="date" name="sale_date" class="form-control" value="{{ date('Y-m-d') }}" required>
        </div>
        <div class="form-group">
            <label for="customer_id">Customer:</label>
            <select name="customer_id" class="form-control" >
                <option value="">Select Customer</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="saleperson_id">Sales Person:</label>
            <select name="saleperson_id" class="form-control" >
                <option value="">Select Customer</option>
                @foreach($salespersons as $salesperson)
                    <option value="{{ $salesperson->id }}">{{ $salesperson->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="product_id">Product:</label>
            <select name="packing_id" class="form-control" required>
                <option value="">Select Product</option>
                @foreach($stocks as $stock)
                    <option value="{{ $stock->packing_id }}">{{ $stock->packing->product->name }} -{{ $stock->packing->size }}{{ $stock->quantity }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="quantity">Rate:</label>
            <input type="number" name="rate" id="rate" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="total_amount">Total Amount:</label>
            <input type="number" name="total_amount" id="total_amount" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-success">Record Sale</button>
    </form>
</main>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        // Bind blur event to rate and quantity input fields
        $('#rate, #quantity').on('blur', function() {
            // Get values of rate and quantity input fields
            var rate = parseFloat($('#rate').val());
            var quantity = parseFloat($('#quantity').val());

            // Calculate total amount by multiplying rate and quantity
            var totalAmount = rate * quantity;

            // Update total amount input field with calculated value
            $('#total_amount').val(totalAmount);
        });
    });
</script>
@endsection
