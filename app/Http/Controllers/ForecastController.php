<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // Laravel's HTTP client
use Illuminate\Support\Facades\DB;

class ForecastController extends Controller
{
    public function getForecastFromAPI()
{
    $rawData = DB::table('inventory_actions')
        ->join('inventory', 'inventory_actions.inventory_id', '=', 'inventory.id')
        ->where('inventory_actions.action_type', 'removed')
        ->select(
            'inventory.id as inventory_id',
            'inventory.name as product_id',
            'inventory_actions.created_at',
            'inventory_actions.quantity_changed as soldCount'
        )
        ->get();

    // Convert to array
    $dataToSend = $rawData->map(function ($row) {
        return [
            'inventory_id' => $row->inventory_id,
            'product_id' => $row->product_id,
            'created_at' => $row->created_at,
            'soldCount' => $row->soldCount,
        ];
    })->toArray();

    // Replace this with your actual deployed Colab API endpoint
    $response = Http::post('https://your-colab-endpoint.run.app/predict', [
        'data' => $dataToSend
    ]);

    $forecastResults = $response->json();

    // You can return this as JSON or pass to a Blade view
    return view('dashboard.forecast_result', compact('forecastResults'));
}
}
