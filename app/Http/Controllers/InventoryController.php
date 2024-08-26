<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{   

    public function __construct(){
        $this->middleware('auth.guard')->only(['view']); // authenticates user before accessing inventory page  // middleware('auth') is used to authenticate the user before accessing any route that requires authentication.  // The middleware will redirect the user to the login page if they are not authenticated.  // The 'auth' middleware is defined in the Kernel.php file located in the app/Http/Kernel.php file.
    }

    public function view(){ // view to display inventory content
        return view('inventory.inventoryView');
    } 
}
