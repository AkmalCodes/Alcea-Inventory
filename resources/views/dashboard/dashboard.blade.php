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
                <p>{{ $recentUpdatedItems->total() }} items updated recently</p>
            </div>
        </div>
        <div class="dashboard-table-container col">
            <div class="card">
                <div class="card-header text-center">
                    <h5>Low Stock Items <strong style="color:rgb(238, 65, 43);">{{ $lowStockItems->count() }}</strong></h5>
                </div>
                <div class="card-body">
                    <table id="lowstockitems" class="table table-borderless">
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
                                    <td>{{ $item->name }} <strong>[ {{ $item->supplier_name }} ]</strong></td>
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
                    <h5>Recently Updated Items <strong style="color:rgb(238, 65, 43);">{{ $recentUpdatedItems->total() }}</strong></h5>
                </div>
                <div class="card-body">
                    <table id="recentlyupdateditems" class="table table-borderless">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Done by</th>
                                <th>Action done</th>
                                <th>Last Updated</th>
                            </tr>
                        </thead>
                        <tbody id="recent-updated-items">
                            @foreach ($recentUpdatedItems as $item)
                                <tr>
                                    <td>{{ $item->inventory->name }} <strong>[ {{ $item->inventory->supplier_name }} ]</strong></td>
                                    <td>{{ $item->performed_by }}</td>
                                    <td>{{ $item->action_type }}</td>
                                    <td>{{ $item->updated_at->format('d/m/Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div id="pagination-links" class="d-flex justify-content-end align-items-center mt-1 mb-1">
                        @include("dashboard.partials.recentupdateitems_pagination") {{-- add the pagination links--}}
                    </div>                   
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault(); // Prevent page reload
        var page = $(this).attr('href').split('page=')[1]; // Get the page number from the link

        // Send AJAX request
        $.ajax({
            url: '/dashboard?page=' + page, // Correct route for pagination
            type: 'GET',
            success: function(response) {
                var tableBody = $('#recentlyupdateditems tbody');
                tableBody.empty(); // Clear the current rows

                // Loop through the items and generate new table rows
                $.each(response.items, function(index, item) {
                    var row = '<tr>';
                    row += '<td>' + item.inventory.name + ' <strong>[' + item.inventory.supplier_name + ']</strong></td>';
                    row += '<td>' + item.performed_by + '</td>';
                    row += '<td>' + item.action_type + '</td>';
                    row += '<td>' + new Date(item.updated_at).toLocaleDateString() + '</td>';
                    row += '</tr>';

                    tableBody.append(row); // Append each row to the table
                });

                // Update pagination
                $('#pagination-links').html(response.pagination_recentupdateitems);
            },
            error: function() {
                alert('Error loading data.');
            }
        });
    });
});

</script>
@endsection
