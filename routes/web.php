<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;

Route::get('/', function () {
    return view('index');
});

// inventory routes
Route::get('/inventory', [InventoryController::class, 'content'])->name('inventory.inventoryView');