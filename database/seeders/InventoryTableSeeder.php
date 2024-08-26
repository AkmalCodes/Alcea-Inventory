<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InventoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inventory')->insert([
            [
                'name' => 'Sugar',
                'category' => 'Dry',
                'description' => 'Granulated white sugar',
                'quantity' => 5.00,
                'unit' => 'kg',
                'reorder_level' => 1.00,
                'storage_location' => 'Pantry',
                'expiration_date' => '2025-08-01',
                'supplier_name' => 'Sweet Supplies Co.',
                'supplier_contact' => '+60123456789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chicken Breast',
                'category' => 'Frozen',
                'description' => 'Boneless chicken breast',
                'quantity' => 10.00,
                'unit' => 'pieces',
                'reorder_level' => 5.00,
                'storage_location' => 'Freezer',
                'expiration_date' => '2024-09-01',
                'supplier_name' => 'ABC Poultry',
                'supplier_contact' => '+60123456789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Milk',
                'category' => 'Wet',
                'description' => 'Fresh cow milk',
                'quantity' => 10.00,
                'unit' => 'liters',
                'reorder_level' => 2.00,
                'storage_location' => 'Refrigerator',
                'expiration_date' => '2024-08-20',
                'supplier_name' => 'Dairy Best',
                'supplier_contact' => '+60123456789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

