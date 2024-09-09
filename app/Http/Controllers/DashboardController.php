<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\InventoryAction;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth.guard');
    }

    public function view(){ // function to get relavent information regarding inventory status
        $totalItems = Inventory::count();
        $lowStockItems = Inventory::whereColumn('quantity', '<', 'reorder_level')->get();
        $recentUpdatedItems = InventoryAction::where('updated_at', '>=', now()->subDays(7))->with('inventory', function ($query) {$query->withTrashed();})->get(); // use with trashed to get items that are soft deleted in inventory table
        return view('dashboard.dashboard', compact('totalItems', 'lowStockItems', 'recentUpdatedItems'));    }
}
