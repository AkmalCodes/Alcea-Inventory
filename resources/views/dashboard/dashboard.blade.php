@extends('layouts.main')

@section('content')
    <div class="dashboard-container container my-4">
        <div class="dashboard-title d-flex justify-content-center align-items-center text-center mt-4">
            <h3>Welcome <strong style="color:rgba(7, 92, 62);">{{ auth()->user()->name }}</strong> to the dashboard</h3>
        </div>
        <div class="dashboard-card-container mt-2">
            <div class="dashboard-card text-center my-2">
                <h5>Total Items</h5>
                <p>{{ $totalItems }} items</p>
            </div>
            <div class="dashboard-card text-center my-2">
                <h5>Low Stock Items</h5>
                <p>{{ $lowStockItems->count() }} items</p>
            </div>
            <div class="dashboard-card text-center my-2">
                <h5>Recently Updated</h5>
                <p>{{ $recentUpdatedItems->count() }} items updated recently</p>
            </div>
        </div>
        <div class="dashboard-table-container col">
            <div class="card">
                <div class="card-header text-center">
                    <h5>Low Stock Items <strong style="color:rgb(238, 65, 43);">{{ $lowStockItems->count() }}</strong></h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
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
        <div class="dashboard-table-container col mt-4">
            <div class="card">
                <div class="card-header text-center">
                    <h5>Recently Updated Items <strong style="color:rgb(238, 65, 43);">{{ $recentUpdatedItems->count() }}</strong></h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Done by</th>
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
