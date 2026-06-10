<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pabrik;
use App\Models\KategoriProduk;
use App\Models\Pembelian;
use App\Models\Produk;
use App\Models\RatingSistem;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        $title = 'Dashboard';
        $jumlah_brand = Pabrik::all()->count();
        $admin = User::where('role', 'admin')->count();
        $pemasukan = Pembelian::where('status_pesanan', '!=', 'dibatalkan')->where('status_pembayaran', '!=', 'belum bayar')->sum('total');
        $rating = RatingSistem::avg('rating');

        // informasi kategori
        $kategori = KategoriProduk::select('kategori_produks.id', 'kategori_produks.nama_kategori', DB::raw('COUNT(produks.id) as jumlah_produk'))
        ->leftJoin('produks', 'kategori_produks.id', '=', 'produks.kategori_id')
        ->groupBy('kategori_produks.id', 'kategori_produks.nama_kategori')
        ->orderBy('kategori_produks.id')
        ->get();

        $data_kategori = [];
        $jumlah_data = [];

        foreach ($kategori as $data) {
            $data_kategori[] = $data->nama_kategori;
            $jumlah_data[] = $data->jumlah_produk;
        }

        // informasi brand
        $brand = Pabrik::select('pabriks.id', 'pabriks.nama_pabrik', DB::raw('COUNT(produks.id) as jumlah_produk'))
        ->leftJoin('produks', 'pabriks.id', '=', 'produks.toko_id')
        ->groupBy('pabriks.id', 'pabriks.nama_pabrik')
        ->orderBy('pabriks.id')
        ->get();

        // dd($brand);

        $data_brand = [];
        $jumlah_data_brand = [];

        foreach ($brand as $data) {
            $data_brand[] = $data->nama_pabrik;
            $jumlah_data_brand[] = $data->jumlah_produk;
        }

        // informasi status pesanan
        $data_pesanan = DB::table('pembelians')
        ->select('status_pesanan', DB::raw('COUNT(id) as jumlah_pesanan'))
        ->whereNotIn('status_pesanan', ['selesai', 'dibatalkan', 'menunggu pembayaran'])
        ->groupBy('status_pesanan')
        ->orderBy('status_pesanan')
        ->get();
    
        $data_status = [];
        $jumlah_data_pesanan = [];
        
        foreach ($data_pesanan as $data) {
            $data_status[] = $data->status_pesanan;
            $jumlah_data_pesanan[] = $data->jumlah_pesanan;
        }

        // informasi status pembelian
        $data_pembelian = DB::table('pembelians')
        ->select(DB::raw('DATE(created_at) as tanggal'), DB::raw('COUNT(id) as jumlah_pesanan'))
        ->where('status_pesanan', 'selesai')
        ->groupBy('tanggal')
        ->orderBy('tanggal')
        ->get();
    
        $data_tanggal = [];
        $jumlah_pembelian = [];
        
        foreach ($data_pembelian as $data) {
            $data_tanggal[] = $data->tanggal;
            $jumlah_pembelian[] = $data->jumlah_pesanan;
        }

        return view('pages.admin.dashboard', compact(
            'title', 'jumlah_brand', 'admin', 'rating', 'pemasukan',
            'data_kategori', 'jumlah_data',
            'data_brand', 'jumlah_data_brand',
            'data_status', 'jumlah_data_pesanan',
            'data_tanggal', 'jumlah_pembelian',
        ));
    }
}
