<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;

Route::get('/', function () {
    return view('layouts.main');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// inventory routes
Route::get('/inventory', [InventoryController::class, 'content'])->name('inventory.inventoryView');


// Authentication Routes
Auth::routes();



