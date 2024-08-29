<?php

namespace App\Http\Controllers;

use App\Models\Inventory; // have to place this first before any other import
use Illuminate\Http\Request;

class InventoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth.guard')->only(['view']); // authenticates user before accessing inventory page  // middleware('auth') is used to authenticate the user before accessing any route that requires authentication.  // The middleware will redirect the user to the login page if they are not authenticated.  // The 'auth' middleware is defined in the Kernel.php file located in the app/Http/Kernel.php file.
    }

    public function view()
    { 
        $inventoryItems = Inventory::all();
        // view to display inventory content
        return view('inventory.inventory_view',compact('inventoryItems'));
    }

    public function viewItem($id){
        // Retrieve the inventory item by its ID
       $item = Inventory::findOrFail($id);

       // Pass the item to the view
       return view('inventory.inventory_viewitem', compact('item')); // compact gets all fields in item then asociates the data with the fields
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
