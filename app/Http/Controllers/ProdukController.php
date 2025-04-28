<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::with('kategori')->paginate(10);
        return view('produk.index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all(['id', 'nama_kategori']);
        return view('produk.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255|unique:produks,nama_produk',
            'kategori_id' => 'required|exists:kategoris,id',
            'kuantitas' => 'required|integer|min:0',
            'harga' => 'required|integer|min:0',
        ], [
            'nama_produk.required' => 'Nama produk harus diisi.',
            'kategori_id.required' => 'Kategori produk harus dipilih.',
            'kuantitas.required' => 'Kuantitas produk harus diisi.',
            'harga.required' => 'Harga produk harus diisi.',
            'kuantitas.min' => 'Kuantitas produk tidak boleh kurang dari 0.',
            'harga.min' => 'Harga produk tidak boleh kurang dari 0.',
        ]);

        Produk::create($validated);
        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        $produk->load('kategori');
        return view('produk.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        $produk->load('kategori');
        $kategoris = Kategori::all(['id', 'nama_kategori']);

        return view('produk.edit', compact('produk', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'kuantitas' => 'required|integer',
            'harga' => 'required|integer|min:0',
        ], [
            'nama_produk.required' => 'Nama produk harus diisi.',
            'kategori_id.required' => 'Kategori produk harus dipilih.',
            'kuantitas.required' => 'Kuantitas produk harus diisi.',
            'harga.required' => 'Harga produk harus diisi.',
            'harga.min' => 'Harga produk tidak boleh kurang dari 0.',
        ]);

        $produk->update($validated);
        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}
