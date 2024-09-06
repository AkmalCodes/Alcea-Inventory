<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth.guard');
    }

    public function view(){ // function to get relavent information regarding inventory status
        $totalItems = Inventory::count();
        $lowStockItems = Inventory::where('quantity', '<', 'reorder_level')->count(); // Low stock
        $recentUpdates = Inventory::where('updated_at', '>=', now()->subDays(7))->count(); // Items updated within the last 7 days
        return view('dashboard', compact('totalItems', 'lowStockItems', 'recentUpdates'));
    }
}
