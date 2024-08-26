<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'view'])->name('home');

// ================== inventory routes ==================
Route::get('/inventory', [InventoryController::class, 'view'])->name('inventory.inventoryView');
// Route to view specific inventory
Route::post('/inventory/{id}', [InventoryController::class, 'viewItem'])->name('inventory.viewIten');
// Route to store the new inventory item
Route::post('/inventory', [InventoryController::class, 'store'])->name('inventory.store');


// ================== Authentication Routes ==================
Auth::routes();



