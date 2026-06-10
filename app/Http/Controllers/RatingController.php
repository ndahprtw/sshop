<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\RatingProduk;
use App\Models\RatingSistem;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    // ------------------------------------------------------------------------- user
    public function create($id) {
        $title = 'Informasi Penjualan';
        $sub_title = 'Detail Informasi';
        $pesanan = Pembelian::find($id);
        return view('pages.user.pesanan-rating', compact('title', 'sub_title', 'pesanan'));
    }

    public function store(Request $request) {
        $rating = new RatingProduk();
        $rating->pembelian_id = $request->pembelian;
        $rating->user_id = auth()->user()->id;
        $rating->rating = $request->rating;
        $rating->ulasan = $request->testimoni;

        if ($rating->save()) {
            return redirect('/pesanan')->with('success', 'Terimakasih atas ulasan Anda!');
        } else {
            return redirect('/pesanan')->with('error', 'Gagal menyimpan ulasan');
        }

    }

    public function store_sistem(Request $request) {
        $rating = new RatingSistem();
        $rating->user_id = $request->user_id;
        $rating->rating = $request->rating;
        $rating->ulasan = $request->testimoni;

        if ($rating->save()) {
            return redirect('/rating-sistem')->with('success', 'Terimakasih atas kritik dan sarannya !');
        } else {
            return redirect('/rating-sistem')->with('error', 'Gagal menyimpan kritik dan saran !');
        }

    }

    // ------------------------------------------------------------------------- admin
    public function index() {
        $no = 1;
        $title = 'Kritik Saran';
        $ulasan = RatingSistem::orderBy('created_at')->get();

        return view('pages.admin.kritik-saran', compact('no', 'title', 'ulasan'));
    }

    public function destroy($id) {   
        $ulasan = RatingSistem::find($id);

        if ($ulasan->delete()){
            return redirect()->back()->with('success', 'Data berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus data');
        } 
    }
}
