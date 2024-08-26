<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// inventory routes
Route::get('/inventory', [InventoryController::class, 'view'])->name('inventory.inventoryView');


// Authentication Routes
Auth::routes();



