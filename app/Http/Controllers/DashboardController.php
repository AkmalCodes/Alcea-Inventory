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
        $lowStockItems = Inventory::whereColumn('quantity', '<', 'reorder_level')->get();
        $recentUpdatedItems = InventoryAction::where('updated_at', '>=', now()->subDays(7))
            ->with('inventory', function ($query) {
                $query->withTrashed(); // retrieves data that has been soft deleted or in other words delted_at <> NULL
            })->paginate(7);

        // If the request is an AJAX call, return the partial view for pagination
        if ($request->ajax()) {
            $recentUpdatedItemsPagination = view('dashboard.partials.recentupdateitems_pagination', compact('recentUpdatedItems'))->render(); // Custom pagination view
            return response()->json([
                'items' => $recentUpdatedItems->items(), // Just the items' data front end will handle data
                'pagination_recentupdateitems' => $recentUpdatedItemsPagination // Cast pagination links to string
            ]);
        }

        return view('dashboard.dashboard', compact('totalItems', 'lowStockItems', 'recentUpdatedItems'));
    }

}
