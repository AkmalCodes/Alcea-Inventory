<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'view'])->name('home');

// ================== inventory routes ==================
Route::get('/inventory', [InventoryController::class, 'view'])->name('inventory.inventory_view');
// Route to view specific inventory
Route::get('/inventory/{id}', [InventoryController::class, 'viewItem'])->name('inventory.inventory_viewitem');
// Route to store the new inventory item
Route::post('/inventory', [InventoryController::class, 'store'])->name('inventory.store');
// Route to delete selected item
Route::delete('/inventory/delete/{id}', [InventoryController::class, 'destroy'])->name('inventory.destroy');
// Route to delete selected item
Route::patch('/inventory/update/{id}', [InventoryController::class, 'patch'])->name('inventory.patch');
// Route to view retrieve specific item data
Route::get('/inventory/get/{id}', [InventoryController::class, 'get'])->name('inventory.get');

// ================== Authentication Routes ==================
Auth::routes();



