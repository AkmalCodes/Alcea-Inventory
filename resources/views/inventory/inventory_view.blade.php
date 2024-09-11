<!-- resources/views/inventory/inventoryIndex.blade.php -->
@extends('layouts.main')

@section('title', 'Inventory Management')

@section('content')
@include('forms.inventory.inventory-add-form')
@include('forms.inventory.inventory-update-form')
<div class="container">
    <div class="desktop-inventory d-flex flex-row p-3">
        <div class="col-md-2 d-none flex-column d-md-flex">
            <div class="container-fluid h-100">
                <ul class="inventory-nav">
                    <li><a href="#">front desk</a></li>
                    <li><a href="#">wet kitchen</a></li>
                    <li><a href="#">dry kitchen</a></li>
                </ul>
            </div>
        </div>
        <div class="col-12 col-md-10 d-flex flex-column justify-content-start">
            <div class="inventory-view">
                <div class="col-12">
                    <div class="container-fluid  px-0 px-md-auto m-0">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search Inventory"
                                aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
                <!----------------------------- BELOW IS CODE FOR INVENTORY VIEW ------------------------------->
                <div class="col-12 d-flex flex-column">
                    <nav class="navbar-nav">
                        <div class="container-fluid d-flex justify-content-center align-items-center h-100 py-2 px-0 px-md-auto m-0">
                            <ul class="sub-inventory-nav">
                                <li><a href="#" data-value="all">All</a></li>
                                <li><a href="#" data-value="frozen">Frozen</a></li>
                                <li><a href="#" data-value="dry">Dry</a></li>
                                <li><a href="#" data-value="wet">Wet</a></li>
                            </ul>
                            <ul class="sub-inventory-nav">
                                <li>
                                    <a class="additem-show" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-plus" viewBox="0 0 16 16">
                                    <path d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5z"/>
                                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1"/>
                                    </svg>Add Item</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div id="pagination-links" class="d-flex justify-content-end align-items-center mt-1 mb-1">
                        @include("inventory.partials.custom_pagination") {{-- add the pagination links--}}
                    </div>
                    <div class="inventory-view-desktop container-fluid h-100 d-none d-md-flex  px-0 px-md-auto m-0">                      
                        <table class="w-100 mt-1">
                            <tr>
                                <th>Product</th>
                                <th>Information</th>
                                <th>Quantity</th>
                                <th>Last Updated</th>
                                <th class="d-none d-md-block">Actions</th>
                            </tr>
                            @foreach($inventoryItems as $item)
                            <tr class="inventory-view-desktop-item" data-category="{{$item->category}}">
                                <td>
                                    <a class=""href="{{route('inventory.inventory_viewitem', $item->id)}}">
                                        <div class="col-6 d-flex justify-content-center align-items-center pe-1 ps-1">
                                            <!-- Replace with dynamic image source if available -->
                                            <img src="{{ asset('images/chicken.png') }}" alt="{{ $item->name }}">
                                        </div>
                                        <div class="col-6" style="text-align: left;">
                                            <span>{{ $item->name }}</span>
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <ul>
                                        <li><p>Supplier:</p></li>
                                        <li><p>{{ $item->supplier_name }}</p></li>
                                        <li><p>Quantity:</p></li>
                                        <li><p>{{ $item->quantity }} {{ $item->unit }}</p></li>
                                        <li><p>Category:</p></li>
                                        <li><p>{{ $item->category }}</p></li>
                                    </ul>
                                </td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->updated_at->format('d/m/Y') }}</td>
                                <td>
                                    <div class="container-fluid m-0 p-0 d-flex justify-content-center align-items-center">
                                        <!-- Actions such as edit, delete, etc. -->
                                        <button class="col-4 mt-1 border-0 d-flex justify-content-center align-items-center add-item-quantity" style="background-color: transparent;" data-id="{{ $item->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                            </svg>
                                        </button>
                                        <button type="button" class="delete-item col-4 mt-1 border-0 d-flex justify-content-center align-items-center delete-item" data-id="{{ $item->id }}" style="background-color: transparent;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                            </svg>
                                        </button>
                                        <button class="col-4 mt-1 border-0 d-flex justify-content-center align-items-center updateitem-show" data-id="{{ $item->id }}" style="background-color: transparent;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>  
                    {{--------------------------- BELOW IS MOBILE VIEW ---------------------------}}
                    <div class="inventory-view-mobile container-fluid h-100 d-flex d-md-none flex-column px-0 px-md-auto">  
                        @foreach($inventoryItems as $item)
                        <div class="inventory-view-mobile-item" data-category="{{$item->category}}">
                            <div class="top-inventory-view d-flex flex-row w-100 align-items-center">
                                <div class="row">
                                    <div
                                        class="left col-4 d-flex flex-column justify-content-center align-items-center ps-3">
                                        <a href="#"><img src="{{ asset('images/chicken.png') }}" alt="{{ $item->name }}"></a>
                                        <div class="row d-flex justify-content-around flex-row w-100">
                                            <button
                                                class="col-4 mt-1 border-0 d-flex justify-content-center align-items-center add-item-quantity"
                                                style="background-color: transparent;" data-id="{{ $item->id }}" >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                                </svg>
                                            </button>
                                            <button
                                                class="col-4 mt-1 border-0 d-flex justify-content-center align-items-center delete-item"
                                                style="background-color: transparent;" data-id="{{ $item->id }}" >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                    <path
                                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                                </svg>
                                            </button>
                                            <button
                                                class="col-4 mt-1 border-0 d-flex justify-content-center align-items-center updateitem-show" 
                                                style="background-color: transparent;" data-id="{{ $item->id }}" >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="middle col-8 p-0">
                                        <ul>
                                            <li>
                                                <p>Ingredient:</p>
                                            </li>
                                            <li>
                                                <p>{{$item->name}}</p>
                                            </li>
                                            <li>
                                                <p>Supplier:</p>
                                            </li>
                                            <li>
                                                <p>{{ $item->supplier_name }}</p>
                                            </li>
                                            <li>
                                                <p>Quantity:</p>
                                            </li>
                                            <li>
                                                <p>{{ $item->quantity }}</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom-inventory-view d-flex flex-row w-100 align-items-center">
                                <div class="left col-4">{{ $item->category }}</div>
                                <div class="right col-4">{{ $item->updated_at }}</div>
                                <div class="right col-4">Stocked</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() { // handles transition for category selections
        $('a[data-value]').on('click', function(event) {
            event.preventDefault();
            var selectedCategory = $(this).data('value');

            // Show or hide items based on the selected category
            $('.inventory-view-desktop-item').each(function() {
                var itemCategory = $(this).data('category');
                if (selectedCategory === 'all' || itemCategory === selectedCategory) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
            $('.inventory-view-mobile-item').each(function() {
            var itemCategory = $(this).data('category');
            if (selectedCategory === 'all' || itemCategory === selectedCategory) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
        });
    });
    $(document).ready(function() { // handles transition for item deletion
        $('.delete-item').on('click', function(event) {
        event.preventDefault();
        var itemId = $(this).data('id');
        var token = '{{ csrf_token() }}';
        var itemRow = $(this).closest('.inventory-view-desktop-item, .inventory-view-mobile-item'); // Adjust this selector to target the correct item row

            if (confirm('Are you sure you want to delete this item?')) {
                $.ajax({
                    url: '/inventory/delete/' + itemId,
                    type: 'DELETE',
                    dataType:'json',
                    data: {
                        _token: token
                    },
                    success: function(response) {
                        var message = 'Item deleted successfully'; // Update toast message
                        var type = 'inventory-delete-success'; //
                        showToastInventory(message,type);
                        itemRow.fadeOut(300, function() {
                            $(this).remove(); // Remove the element after fade out
                        });
                    },
                    error: function(response) {
                        alert('Error deleting item.');
                    }
                });
            }
        });
    });
    $(document).ready(function() { // handles pagination of inventory items
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1]; // Get the page number from the clicked link

            $.ajax({
                url: '/inventory?page=' + page,
                type: 'GET',
                success: function(response) {
                    // Clear the current table body
                    $('.inventory-view-desktop tbody').empty();
                    $('.inventory-view-mobile').empty(); // Assuming mobile view as well

                    // Loop through response.items and build rows for desktop and mobile view
                    $.each(response.items, function(index, item) {
                        // Desktop View Rows
                        var desktopRow = `
                            <tr class="inventory-view-desktop-item" data-category="${item.category}">
                                <td>
                                    <a href="/inventory/${item.id}">
                                        <div class="col-6 d-flex justify-content-center align-items-center pe-1 ps-1">
                                            <img src="/images/chicken.png" alt="${item.name}">
                                        </div>
                                        <div class="col-6" style="text-align: left;">
                                            <span>${item.name}</span>
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <ul>
                                        <li><p>Supplier:</p></li>
                                        <li><p>${item.supplier_name}</p></li>
                                        <li><p>Quantity:</p></li>
                                        <li><p>${item.quantity} ${item.unit}</p></li>
                                        <li><p>Category:</p></li>
                                        <li><p>${item.category}</p></li>
                                    </ul>
                                </td>
                                <td>${item.quantity}</td>
                                <td>${new Date(item.updated_at).toLocaleDateString()}</td>
                                <td>
                                    <div class="container-fluid m-0 p-0 d-flex justify-content-center align-items-center">
                                        <button class="col-4 mt-1 border-0 d-flex justify-content-center align-items-center add-item-quantity" style="background-color: transparent;" data-id="${item.id}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                            </svg>
                                        </button>
                                        <button type="button" class="delete-item col-4 mt-1 border-0 d-flex justify-content-center align-items-center delete-item" data-id="${item.id}" style="background-color: transparent;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                            </svg>
                                        </button>
                                        <button class="col-4 mt-1 border-0 d-flex justify-content-center align-items-center updateitem-show" data-id="${item.id}" style="background-color: transparent;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>`;

                        var dekstopRowHeader = `
                            <tr>
                                <th>Product</th>
                                <th>Information</th>
                                <th>Quantity</th>
                                <th>Last Updated</th>
                                <th class="d-none d-md-block">Actions</th>
                            </tr>
                            `;

                        // Append desktop row
                        if(i==0){
                            $('.inventory-view-desktop tbody').append(dekstopRowHeader);
                        }else{
                            continue;   
                        }
                        $('.inventory-view-desktop tbody').append(desktopRow);

                        // Mobile View Rows
                        var mobileRow = `
                            <div class="inventory-view-mobile-item" data-category="${item.category}">
                                <div class="top-inventory-view d-flex flex-row w-100 align-items-center">
                                    <div class="row">
                                        <div class="left col-4 d-flex flex-column justify-content-center align-items-center ps-3">
                                            <a href="#"><img src="/images/chicken.png" alt="${item.name}"></a>
                                            <div class="row d-flex justify-content-around flex-row w-100">
                                               <button class="col-4 mt-1 border-0 d-flex justify-content-center align-items-center add-item-quantity" style="background-color: transparent;" data-id="${item.id}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                                    </svg>
                                                </button>
                                                <button type="button" class="delete-item col-4 mt-1 border-0 d-flex justify-content-center align-items-center delete-item" data-id="${item.id}" style="background-color: transparent;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                                    </svg>
                                                </button>
                                                <button class="col-4 mt-1 border-0 d-flex justify-content-center align-items-center updateitem-show" data-id="${item.id}" style="background-color: transparent;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="middle col-8 p-0">
                                            <ul>
                                                <li><p>Ingredient:</p></li>
                                                <li><p>${item.name}</p></li>
                                                <li><p>Supplier:</p></li>
                                                <li><p>${item.supplier_name}</p></li>
                                                <li><p>Quantity:</p></li>
                                                <li><p>${item.quantity}</p></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="bottom-inventory-view d-flex flex-row w-100 align-items-center">
                                    <div class="left col-4">${item.category}</div>
                                    <div class="right col-4">${new Date(item.updated_at).toLocaleDateString()}</div>
                                    <div class="right col-4">Stocked</div>
                                </div>
                            </div>`;

                        // Append mobile row
                        $('.inventory-view-mobile').append(mobileRow);
                    });

                    // Update pagination links
                    $('#pagination-links').html(response.pagination);
                },
                error: function() {
                    alert('Error loading data.');
                }
            });
        });
    });
</script>
@endsection