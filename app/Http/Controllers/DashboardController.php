<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\InventoryAction;
use App\Http\Controllers\ForecastController;

class DashboardController extends Controller
{
    public function view(Request $request)
    {
        $forecastController = new ForecastController();
        $forecastedItems = collect($forecastController->getForecastFromAPI());

        // your existing variables
        $totalItems = Inventory::count();
        $lowStockItems = Inventory::whereColumn('quantity', '<', 'reorder_level')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        $lowStockItemsCount = $lowStockItems->total();
        $recentUpdatedItems = InventoryAction::where('updated_at', '>=', now()->subDays(7))
            ->with('inventory', function ($query) {
                $query->withTrashed();
            })->paginate(7);

        return view('dashboard.dashboard', compact(
            'totalItems',
            'lowStockItems',
            'lowStockItemsCount',
            'recentUpdatedItems',
            'forecastedItems' // pass to view
        ));
    }
}

