<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function view(){ // view to display inventory content
        return view('inventory.inventoryView');
    } 
}
