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
        $produk = Produk::select('jenis', DB::raw('count(*) as total'))->groupBy('jenis')->get();
        return view('pages.produk-grafis', compact('produk'));
    }
}
