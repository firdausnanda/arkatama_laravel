<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = Http::get('https://dummyjson.com/products')->json();

        foreach ($data['products'] as $d) {
            Produk::create([
                'nama_produk' => $d['title'],
                'jenis' => $d['category'],
                'harga' => $d['price'],
            ]);
        }
    }
}
