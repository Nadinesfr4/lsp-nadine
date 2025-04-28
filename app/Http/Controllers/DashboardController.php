<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Hitung jumlah kategori
        $totalCategories = Kategori::count();

        // Hitung jumlah produk
        $totalProducts = Produk::count();

        // Hitung jumlah transaksi
        $totalTransactions = Transaksi::count();

        // Hitung total pendapatan dari semua transaksi
        $totalPendapatan = Transaksi::sum('total_harga');

        return view('dashboard', compact(
            'jumlahKategori',
            'jumlahProduk',
            'jumlahTransaksi',
            'totalPendapatan'
        ));
    }

    // Method lain tetap kosong dulu
    public function create() {

     }

    public function store(Request $request) {

     }

    public function show(string $id) { 

    }

    public function edit(string $id) { 

    }

    public function update(Request $request, string $id) {

     }

    public function destroy(string $id) {

     }

}