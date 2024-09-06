<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('home');
});
Route::get('/dashboard', [DashboardController::class, 'view'])->name('dashboard_view');

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
Route::patch('/inventory/patch/{id}', [InventoryController::class, 'patch'])->name('inventory.patch');
// Route to view retrieve specific item data
Route::get('/inventory/get/{id}', [InventoryController::class, 'getItem'])->name('inventory.getItem');

// ================== Authentication Routes ==================
Auth::routes();






