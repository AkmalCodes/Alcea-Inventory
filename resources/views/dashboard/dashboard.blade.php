@extends('layouts.main')

@section('content')
    <div class="dashboard-container container my-4">
        <div class="dashboard-title d-flex justify-content-center align-items-center text-center mt-4">
            <h3>Welcome {{ auth()->user()->name }} to your dashboard</h3>
        </div>
        <div class="row mt-4">
            <div class="dashboard-card col-md-4 text-center">
                <h5>Total Items</h5>
                <p>{{ $totalItems }} items</p>
            </div>
            <div class="dashboard-card col-md-4 text-center">
                <h5>Low Stock Items</h5>
                <p>{{ $lowStockItems->count() }} items</p>
            </div>
            <div class="dashboard-card col-md-4 text-center">
                <h5>Recently Updated</h5>
                <p>{{ $recentUpdatedItems->count() }} items updated recently</p>
            </div>
        </div>
        <div class="container col-12">
            <div class="col-md-12 my-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Low Stock Items ({{ $lowStockItems->count() }})</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Reorder Level</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lowStockItems as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->reorder_level }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Recent Updates Table -->
        <div class="container col-md-12 my-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Recently Updated Items ({{ $recentUpdatedItems->count() }})</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Performed by</th>
                                <th>Last Updated</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentUpdatedItems as $item)
                                <tr>
                                    <td>{{ $item->inventory->name }}</td>
                                    <td>{{ $item->performed_by }}</td>
                                    <td>{{ $item->updated_at->format('d/m/Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
