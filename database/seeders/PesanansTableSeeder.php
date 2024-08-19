<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PesanansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $statuses = ['pay', 'complete', 'cancelled', 'to ship', 'to receive'];

        foreach ($statuses as $status) {
            for ($i = 0; $i < 2; $i++) {
                DB::table('pesanans')->insert([
                    'order_id' => 'WXY203030204',
                    'tarikh_pesanan' => now(),
                    'info' => 'info',
                    'status' => $status,
                    'jenis_penghantaran' => 'poslaju',
                    'maklumat_penghantaran' => 'delivery id',
                    'maklumat' => 'product info',
                    'harga_pesanan' => rand(100, 1000) / 10,
                    'qty_pesanan' => rand(1, 10),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
