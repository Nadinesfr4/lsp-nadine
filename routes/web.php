<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Transaksi;
use Carbon\Carbon;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    // Untuk total rupiah
    $transactions = DB::table('transaksis')
        ->selectRaw('MONTH(created_at) as month, SUM(total_harga) as total')
        ->groupBy('month')
        ->orderBy('month')
        ->get();

    // Untuk jumlah transaksi
    $counts = DB::table('transaksis')
        ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->groupBy('month')
        ->orderBy('month')
        ->get();

    $months = [];
    $totals = [];
    $countsPerMonth = [];
    $totalAll = 0;

    $totalCategories = Kategori::count();  // Count the total number of categories

    $totalProducts = Produk::count();  // Count the total number of products

    $totalTransactions = Transaksi::count();

    foreach ($transactions as $t) {
        $months[] = Carbon::create()->month($t->month)->locale('id')->monthName;
        $totals[] = $t->total;
        $totalAll += $t->total;
    }

    foreach ($counts as $c) {
        $countsPerMonth[] = $c->count;
    }

    return view('dashboard', [
        'transactionMonths' => $months,
        'transactionTotals' => $totals,
        'transactionCounts' => $countsPerMonth,
        'totalRevenue' => $totalAll,
        'totalCategories' => $totalCategories, // Pass the totalCategories variable
        'totalProducts' => $totalProducts,  // Pass the totalProducts variable
        'totalTransactions' => $totalTransactions,  // Pass the totalProducts variable

        
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/produk/{produk}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/{produk}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{produk}', [ProdukController::class, 'destroy'])->name('produk.destroy');

    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/kategori/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
    Route::get('/keranjang/create', [KeranjangController::class, 'create'])->name('keranjang.create');
    Route::post('/keranjang', [KeranjangController::class, 'store'])->name('keranjang.store');
    Route::post('/keranjang/checkout', [KeranjangController::class, 'checkout'])->name('keranjang.checkout');
    Route::delete('/keranjang/{item}', [KeranjangController::class, 'destroy'])->name('keranjang.destroy');

    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('/transaksi/{transaksi}', [TransaksiController::class, 'show'])->name('transaksi.show');
    Route::get('/transaksi/{id}/download-struk', [\App\Http\Controllers\TransaksiController::class, 'downloadStruk'])->name('transaksi.downloadStruk');
});

require __DIR__ . '/auth.php';