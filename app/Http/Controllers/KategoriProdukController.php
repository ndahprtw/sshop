<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;

class KategoriProdukController extends Controller
{
    public function index() {
        $no = 1;
        $title = 'Kategori Produk';
        $kategori = KategoriProduk::orderBy('nama_kategori')->get();
        return view('pages.admin.kategori', compact('no', 'title', 'kategori'));
    }

    public function create() {      
    }

    public function store(Request $request) {
        // dd($request);    
        $request->validate([
            'nama_kategori' => 'required|unique:kategori_produks',
        ]);

        $kategori = new KategoriProduk();
        $kategori->nama_kategori = $request->nama_kategori;

        if ($kategori->save()) {
            return redirect()->back()->with('success', 'Data berhasil disimpan!');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data');
        }
    }

    public function edit($id) {    
        $item = KategoriProduk::find($id);
        return view('pages.admin.kategori', compact('item'));
    }

    public function update($id, Request $request) {
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        $kategori = KategoriProduk::findOrFail($id);
        $kategori->nama_kategori = $request->nama_kategori;

        if ($kategori->save()) {
            return redirect()->back()->with('success', 'Data berhasil disimpan!');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data');
        }
    }

    public function destroy($id) {   
        $kategori_produk = KategoriProduk::find($id);

        $cek_produk = Produk::where('kategori_id', $id)->count();
        if ($cek_produk > 0) {
            return redirect()->back()->with('warning', 'Kategori ' . $kategori_produk->nama_kategori . ' memiliki ' . $kategori_produk->produk->count() . ' data produk terkait');
        } else {
            if ($kategori_produk->delete()){
                return redirect()->back()->with('success', 'Data berhasil dihapus!');
            } else {
                return redirect()->back()->with('error', 'Gagal menghapus data');
            } 
        }
    }
}
