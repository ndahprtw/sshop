<?php

namespace App\Http\Controllers;

use App\Models\Pabrik;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Pembelian;
use App\Models\Produk;
use App\Models\RatingProduk;

class PabrikController extends Controller
{
    public function index() {
        $no = 1;
        $title = 'Informasi Pabrik';
        $pabrik = Pabrik::orderBy('nama_pabrik')->get();
        return view('pages.admin.pabrik', compact('title', 'no', 'pabrik'));
    }

    public function create() {    
    }

    public function store(Request $request) {
        // dd($request);    
        $request->validate([
            'nama_pabrik' => 'required|unique:pabriks',
            'logo' => 'required',
        ]);

        $logo_brand = $request->file('logo');
        $imageName = $request->nama_pabrik .'.' . $logo_brand->extension();
        $logo_brand->move(public_path('assets/img/pabrik/'), $imageName);

        $pabrik = new Pabrik();
        $pabrik->nama_pabrik = $request->nama_pabrik;
        $pabrik->logo = $imageName;
        $pabrik->whatsApp = $request->whatsApp;
        $pabrik->instagram = $request->instagram;
        $pabrik->email = $request->email;

        if ($pabrik->save()) {
            return redirect()->back()->with('success', 'Data berhasil disimpan!');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data');
        }
    }

    public function show($id) {  
        $no = 1;  
        $title = 'Informasi Pabrik';
        $sub_title = 'Ulasan Produk';
        $data_produk = Produk::where('toko_id', $id)->pluck('id');
        $data_pembelian_produk = Pembelian::whereIn('produk_id', $data_produk)->pluck('id');
        $ratings = RatingProduk::whereIn('pembelian_id', $data_pembelian_produk)->get();
        return view('pages.admin.pabrik-review', compact('no', 'title', 'sub_title', 'data_pembelian_produk', 'ratings'));
    }

    public function edit($id) {    
        $item = Pabrik::find($id);
        return view('pages.admin.pabrik', compact('item'));

    }

    public function update($id, Request $request) {
        $request->validate([
            'nama_pabrik' => 'required',
        ]);

        $pabrik = Pabrik::findOrFail($id);

        if ($request->hasFile('logo')) {
            // Hapus file foto sebelumnya dari penyimpanan
            if ($pabrik->logo && file_exists(public_path('assets/img/pabrik/' . $pabrik->logo))) {
                unlink(public_path('assets/img/pabrik/' . $pabrik->logo));
            }
            $logo_brand = $request->file('logo');
            $imageName = $request->nama_pabrik .'.' . $logo_brand->extension();
            $logo_brand->move(public_path('assets/img/pabrik/'), $imageName);    
        } else {
            $imageName = $pabrik->logo;
        }

        $pabrik->nama_pabrik = $request->nama_pabrik;
        $pabrik->logo = $imageName;
        $pabrik->whatsApp = $request->whatsApp;
        $pabrik->instagram = $request->instagram;
        $pabrik->email = $request->email;

        if ($pabrik->save()) {
            return redirect()->back()->with('success', 'Data berhasil disimpan!');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data');
        }
    }

    public function destroy($id) {  
        $brand = Pabrik::find($id);

        $cek_produk = Produk::where('toko_id', $id)->count();
        if ($cek_produk > 0) {
            return redirect()->back()->with('warning', 'Brand ' . $brand->nama_pabrik . ' memiliki ' . $brand->produk->count() . ' data produk terkait');
        } else {
            if ($brand->logo) {
                $fotoPath = public_path('assets/img/pabrik/' . $brand->logo);
    
                if (file_exists($fotoPath)) {
                    unlink($fotoPath);
                }
            }
            if ($brand->delete()){
                return redirect()->back()->with('success', 'Data berhasil dihapus!');
            } else {
                return redirect()->back()->with('error', 'Gagal menghapus data');
            } 
        }  
    }
}
