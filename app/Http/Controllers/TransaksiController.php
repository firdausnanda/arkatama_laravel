<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index(){
        $transaksi = Transaksi::with('user', 'produk')->get();
        return view('pages.transaksi', compact('transaksi'));
    } 
    
    public function chart(){
        $transaksi = Transaksi::select(DB::raw('count(*) as user_count'), 'id_user')->groupBy('id_user')->get();
        $user = User::pluck('name');
        
        $admin = $transaksi[0]->user_count;
        $user = $transaksi[1]->user_count;
        // dd($user);

        // $data = [];
        // foreach ($transaksi as $v) {
        //     // $data =+ [
                


        //     // ];
        // }

        return view('pages.transaksi-grafis', compact('admin', 'user'));
    } 
}
