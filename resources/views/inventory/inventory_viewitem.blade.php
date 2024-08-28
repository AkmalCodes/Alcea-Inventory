@extends('layouts.main')

@section('content')
<div class="container">
    <h1>{{ $item->name }}</h1>
    <img src="{{ asset('images/chicken.png') }}" alt="{{ $item->name }}">
    <p>Category: {{ $item->category }}</p>
    <p>Description: {{ $item->description }}</p>
    <p>Quantity: {{ $item->quantity }} {{ $item->unit }}</p>
    <p>Supplier: {{ $item->supplier_name }}</p>
    <p>Contact: {{ $item->supplier_contact }}</p>
    <p>Storage Location: {{ $item->storage_location }}</p>
    <p>Expiration Date: {{ $item->expiration_date }}</p>
</div>
@endsection