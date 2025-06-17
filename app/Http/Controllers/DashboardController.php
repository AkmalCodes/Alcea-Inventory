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

    public function view(Request $request)
    {
        $totalItems = Inventory::count();
        $lowStockItems = Inventory::whereColumn('quantity', '<', 'reorder_level')
            ->orderBy('created_at', 'desc')
            ->paginate(15 ); // now paginated
        $lowStockItemsCount = Inventory::whereColumn('quantity', '<', 'reorder_level')->count();
        $recentUpdatedItems = InventoryAction::where('updated_at', '>=', now()->subDays(7))
            ->with('inventory', function ($query) {
                $query->withTrashed(); // retrieves data that has been soft deleted or in other words delted_at <> NULL
            })->paginate(7);

        // If the request is an AJAX call, return the partial view for pagination
        if ($request->ajax()) {
            $recentUpdatedItemsPagination = view('dashboard.partials.recentupdateitems_pagination', compact('recentUpdatedItems'))->render();
            $lowStockItemsPagination = view('dashboard.partials.lowstockitems_pagination', compact('lowStockItems'))->render();
        
            return response()->json([
                'recent_update_items' => $recentUpdatedItems->items(),
                'pagination_recentupdateitems' => $recentUpdatedItemsPagination,
                'low_stock_items' => $lowStockItems->items(),
                'pagination_lowstockitems' => $lowStockItemsPagination,
            ]);
        }
        

        return view('dashboard.dashboard', compact('totalItems', 'lowStockItems', 'recentUpdatedItems','lowStockItemsCount'));
    }

}
