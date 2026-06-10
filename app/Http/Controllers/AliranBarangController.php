<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\AliranBarang;
use Illuminate\Http\Request;

class AliranBarangController extends Controller
{
    public function index() {
        $title = 'Informasi Keluar - Masuk Barang';
        $no = 1;
        $data_barang = AliranBarang::all();
        $produk = Produk::with('brand', 'kategori')->orderBy('nama_produk')->get();
        return view('pages.admin.data-barang', compact('title', 'no', 'data_barang', 'produk'));
    }

    public function store(Request $request) {
        // dd($request);    
        $request->validate([
            'produk' => 'required',
            'stok' => 'required',
            'jenis' => 'required',
        ]);

        $jenis = $request->jenis;

        $aliran_barang = new AliranBarang();
        $aliran_barang->produk_id = $request->produk;
        $aliran_barang->stok = $request->stok;
        $aliran_barang->jenis = $jenis;
        $aliran_barang->penanggung_jawab = auth()->user()->name;
        $aliran_barang->catatan = $request->catatan;

        $produk = Produk::findOrFail($request->produk);

        
        if ($aliran_barang->save()) {
            if ($request->jenis === 'barang masuk') {
                $produk->increment('stok', $request->stok);
            } else {
                if ($produk->stok >= $request->stok) {
                    $produk->decrement('stok', $request->stok);
                } else {
                    return redirect()->back()->with('error', 'Stok tidak mencukupi!');
                }
            }
            return redirect()->back()->with('success', 'Data berhasil disimpan!');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data');
        }
    }
}
