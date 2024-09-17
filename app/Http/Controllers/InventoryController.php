<?php

namespace App\Http\Controllers;

use App\Models\Inventory; // have to place this first before any other import
use App\Models\InventoryAction; // have to place this first before any other import
use Illuminate\Http\Request;

class InventoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth.guard')->only(['view']); // authenticates user before accessing inventory page  // middleware('auth') is used to authenticate the user before accessing any route that requires authentication.  // The middleware will redirect the user to the login page if they are not authenticated.  // The 'auth' middleware is defined in the Kernel.php file located in the app/Http/Kernel.php file.
    }

    public function view(Request $request)
    { 
        $inventoryItemsQuery = Inventory::query();

        // Category filter (if provided in the request)
        if ($request->has('category') && $request->category !== 'all') {
            $inventoryItemsQuery->where('category', $request->category);
        }
        // Paginate the filtered query
        $inventoryItems = $inventoryItemsQuery->paginate(10);
        
        if ($request->ajax()) {
            $paginationView = view('inventory.partials.custom_pagination', compact('inventoryItems'))->render(); // Custom pagination view
            return response()->json([
                'items' =>  $inventoryItems->items(), // Render the items view for AJAX
                'pagination' => $paginationView, // Use custom pagination
            ]);
        }
        // view to display inventory content
        return view('inventory.inventory_view',compact('inventoryItems'));
    }

    public function getItem($id){
        $item = Inventory::findOrFail($id);
        return $item;
    }

    public function viewItem($id){
        // Retrieve the inventory item by its ID
       $item = $this->getItem($id);

       // Pass the item to the view
       return view('inventory.inventory_viewitem', compact('item')); // compact gets all fields in item then asociates the data with the fields
   }

   public function destroy(Request $request, $id)
    {
        // Find the item by its ID
        $item = Inventory::findOrFail($id);

        // Delete the item
        $item->delete();

        InventoryAction::create([
            'inventory_id' => $id,
            'action_type' => 'removed',
            'performed_by' => auth()->user()->name,
            'reason_for_action' => 'removed',
        ]);

        // Return a success message
        if ($request->expectsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Inventory deleted successfully!',
            ], 200); // 200 status code indicates that the request was successful
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Inventory deleted unsuccessful!',
            ], 500);
        }
    }

    public function patch(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:dry,frozen,wet',
            'description' => 'nullable|string',
            'quantity' => 'required|numeric|min:0',
            'unit' => 'required|string|max:255',
            'reorder_level' => 'nullable|numeric|min:0',
            'storage_location' => 'nullable|string|max:255',
            'expiration_date' => 'nullable|date',
            'supplier_name' => 'nullable|string|max:255',
            'supplier_contact' => 'nullable|string|max:255',
        ]);

        // Find the existing inventory item by ID
        $inventory = Inventory::findOrFail($id);

        // Update the inventory item with the validated data
        $inventory->update($validatedData);

        // Check if the request expects a JSON response
        if ($request->expectsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Inventory item updated successfully!',
                'data' => $inventory // Optionally return the updated inventory item
            ]);
        }else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Inventory iten update unsuccessful!',
            ], 500);
        }
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:dry,frozen,wet',
            'description' => 'nullable|string',
            'quantity' => 'required|numeric|min:0',
            'unit' => 'required|string|max:255',
            'reorder_level' => 'nullable|numeric|min:0',
            'storage_location' => 'nullable|string|max:255',
            'expiration_date' => 'nullable|date',
            'supplier_name' => 'nullable|string|max:255',
            'supplier_contact' => 'nullable|string|max:255',
        ]);

        // Create a new inventory item
        $inventory = Inventory::create($validatedData);
        $username = auth()->user()->name;
        InventoryAction::create([
            'inventory_id' => '1',
            'action_type' => 'added',
            'performed_by' => $username,
            'reason_for_action' => 'initial transaction',
        ]);

        // Check if the request expects a JSON response (like when sent via AJAX)
        if ($request->expectsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Inventory item added successfully!',
                'inventory' => $inventory
            ], 201); // 201 status code indicates that a resource was successfully created
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to add inventory item.',
            ], 500);    
        }

        // // Fallback for non-AJAX requests (normal form submission)
        // return redirect()->route('inventory.view')->with('success', 'Inventory item added successfully!');
    }

}
