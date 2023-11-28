<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function index() 
    {
        $produk = Produk::get();
        
        return view('pages.produk', compact('produk'));
    }
    
    public function chart()
    {
        $produk_awal = Produk::select( DB::raw('count(*) as total'))->groupBy('jenis')->get();
        $produk_jenis = $produk_awal->pluck('jenis');
// dd($produk_awal);
        $produk = [];
        foreach ($produk_awal as $v) {
            $produk += [
                $v->jenis => $v->total
            ];
        }

        return view('pages.produk-grafis', compact('produk', 'produk_jenis'));
    }
}
