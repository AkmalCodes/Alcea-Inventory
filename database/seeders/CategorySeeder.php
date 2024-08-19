<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category')->insert([
            'name' => 'inventory',
            'has_children' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
