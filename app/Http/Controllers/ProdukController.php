<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use App\Models\Pabrik;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index() {
        $no = 1;
        $title = 'Daftar Produk';
        $produk = Produk::with('brand', 'kategori')->orderBy('nama_produk')->get();
        $pabrik = Pabrik::orderBy('nama_pabrik')->get();
        $kategori = KategoriProduk::orderBy('nama_kategori')->get();

        // return $produk;
        return view('pages.admin.produk', compact('no', 'title', 'produk', 'pabrik', 'kategori'));
    }

    public function create() {    
    }

    public function store(Request $request) {
        // dd($request);    
        $request->validate([
            'nama_produk' => 'required|unique:produks|max:225',
            'brand' => 'required',
            'kategori' => 'required',
            'foto_produk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required',
        ]);

        $produk_image = $request->file('foto_produk');
        $imageName = $request->nama_produk .'.' . $produk_image->extension();
        $produk_image->move(public_path('assets/img/produk/'), $imageName);

        $produk = new Produk();
        $produk->nama_produk = $request->nama_produk;
        $produk->foto_produk = $imageName;
        $produk->toko_id = $request->brand;
        $produk->kategori_id = $request->kategori;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->deskripsi = $request->deskripsi;

        if ($produk->save()) {
            return redirect()->back()->with('success', 'Data berhasil disimpan!');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data');
        }
    }

    public function edit($id) {    
        $item = Pabrik::with('brand', 'kategori')->find($id);
        $pabrik = Pabrik::orderBy('nama_pabrik')->get();
        $kategori = KategoriProduk::orderBy('nama_kategori')->get();
        return view('pages.admin.produk', compact('item', 'pabrik', 'kategori'));
    }

    public function update($id, Request $request) {
        $request->validate([
            'nama_produk' => 'required|max:225',
            'brand' => 'required',
            'kategori' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
        ]);

        $produk = Produk::findOrFail($id);

        if ($request->hasFile('foto_produk')) {
            // Hapus file foto sebelumnya dari penyimpanan
            if ($produk->foto_produk && file_exists(public_path('assets/img/produk/' . $produk->foto_produk))) {
                unlink(public_path('assets/img/produk/' . $produk->foto_produk));
            }
            $produk_image = $request->file('foto_produk');
            $imageName = $request->nama_produk .'.' . $produk_image->extension();
            $produk_image->move(public_path('assets/img/produk/'), $imageName);    
        } else {
            $imageName = $produk->foto_produk;
        }

        $produk->nama_produk = $request->nama_produk;
        $produk->foto_produk = $imageName;
        $produk->toko_id = $request->brand;
        $produk->kategori_id = $request->kategori;
        $produk->harga = $request->harga;
        $produk->deskripsi = $request->deskripsi;

        if ($produk->save()) {
            return redirect()->back()->with('success', 'Data berhasil disimpan!');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data');
        }
    }

    public function destroy($id) {    
        $produk = Produk::find($id);

        if ($produk->foto_produk) {
            $fotoPath = public_path('assets/img/produk/' . $produk->foto_produk);

            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }

        if ($produk->delete()){
            return redirect()->back()->with('success', 'Data berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
    }

}
