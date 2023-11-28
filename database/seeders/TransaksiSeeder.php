<?php

namespace Database\Seeders;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::get()->pluck('id');
        $produk = Produk::get()->pluck('id');

        for ($i=0; $i < 10; $i++) { 
            Transaksi::create([
                'id_user' => $user->random(),
                'id_produk' => $produk->random(),
                'tgl_transaksi' => now()
            ]);
        }

    }
}
