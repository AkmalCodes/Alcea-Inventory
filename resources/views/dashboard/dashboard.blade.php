@extends('layouts.main')

@section('content')
    <div class="dashboard-container container">
        <div class="dashboard-title">
            <h3>Welcome {{ auth()->user()->name }} to your dashboard</h3>
        </div>
        <div class="row mt-4">
            <!-- Total Inventory Items -->
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Items</h5>
                        <p class="card-text">{{ $totalItems }} items</p>
                    </div>
                </div>
            </div>
            <!-- Low Stock Items -->
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Low Stock Items</h5>
                        <p class="card-text">{{ $lowStockItems }} items</p>
                    </div>
                </div>
            </div>
            <!-- Recently Updated Items -->
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Recently Updated</h5>
                        <p class="card-text">{{ $recentUpdates }} items updated recently</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
