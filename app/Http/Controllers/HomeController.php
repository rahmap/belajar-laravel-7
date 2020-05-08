<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $encrypted = encrypt(9);
        // $decrypted = decrypt($encrypted);
        // dd($encrypted);
        return view('home.home');
    }

    public function detailProduk($id)
    {
        $pro = Produk::with('kategori')->findOrFail($id);
        // $pro = Kategori::findOrFail(2)->Produk();
        echo $pro->kategori->nama;
        dd($pro);
    }
}
