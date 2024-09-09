<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventoryActionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inventory_actions')->insert([
            [
                'inventory_id' => 1, // Corresponds to 'Sugar'
                // 'date_of_action' => now(),
                'action_type' => 'Added',
                'quantity_changed' => 5.00,
                'reason_for_action' => 'Initial stock',
                'performed_by' => 'satan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'inventory_id' => 2, // Corresponds to 'Chicken Breast'
                // 'date_of_action' => now(),
                'action_type' => 'Added',
                'quantity_changed' => 10.00,
                'reason_for_action' => 'Initial stock',
                'performed_by' => 'satan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'inventory_id' => 3, // Corresponds to 'Milk'
                // 'date_of_action' => now(),
                'action_type' => 'Added',
                'quantity_changed' => 10.00,
                'reason_for_action' => 'Initial stock',
                'performed_by' => 'satan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

