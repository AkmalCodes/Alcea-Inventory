<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'view'])->name('home');

// inventory routes
Route::get('/inventory', [InventoryController::class, 'view'])->name('inventory.inventoryView');


// Authentication Routes
Auth::routes();



