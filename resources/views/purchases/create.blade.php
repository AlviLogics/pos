@extends('admin.layouts.layout')
@section('content')
<main>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Purchase</div>

                    <div class="card-body">
                        
                        <form method="POST" action="{{ route('purchases.store') }}">
                            @csrf

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

                            <div class="form-group">
                                <label for="date">Date:</label>
                                <input type="date" name="date" id="date" value="{{ date('Y-m-d') }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="bill_number">Bill Number:</label>
                                <input type="text" name="bill_number" id="bill_number" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="vendor_id">Vendor:</label>
                                <select name="vendor_id" id="vendor_id" class="form-control" required>
                                    @foreach($vendors as $vendor)
                                        <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="packing_id">Product:</label>
                                <select name="packing_id" id="packing_id" class="form-control" required>
                                    @foreach($packings as $packing)
                                        <option value="{{ $packing->id }}">{{ $packing->product->name }} - {{ $packing->size }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="particular">Particular:</label>
                                <input type="text" name="particular" id="particular" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="rate">Rate:</label>
                                <input type="number" name="rate" id="rate" class="form-control" required>
                            </div>

                            <!-- Add more form fields as needed -->

                            <button type="submit" class="btn btn-primary">Create Purchase</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
