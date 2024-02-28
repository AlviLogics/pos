@extends('admin.layouts.layout')
@section('content')
<main>
<h1>Payments</h1>

<a href="{{ route('payments.create') }}" class="btn btn-success">Make Payments</a>

</main>
@endsection
