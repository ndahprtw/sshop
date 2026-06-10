<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pembelian;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PesananController extends Controller
{
    // ------------------------------------------------------------------------- admin
    public function index() {
        $title = 'Informasi Penjualan';
        $semua_pesanan = Pembelian::orderby('created_at')->get();
        return view('pages.admin.penjualan', compact('title', 'semua_pesanan'));
    }
        
    public function show($id) {
        $title = 'Informasi Penjualan';
        $sub_title = 'Detail Informasi';
        $pesanan = Pembelian::find($id);
        return view('pages.admin.penjualan-detail', compact('title', 'sub_title', 'pesanan'));
    }

    public function edit_data_kemas($id) {
        $pesanan = Pembelian::find($id);
        $pesanan->update([
            'status_pesanan' => 'dikemas',
        ]);

        return redirect('/penjualan')->with('success', 'Status Pesanan Berhasil Diperbarui !');
        
    }
    public function edit_data_kirim($id) {
        $pesanan = Pembelian::find($id);
        $pesanan->update([
            'status_pesanan' => 'dikirim',
        ]);

        return redirect('/penjualan')->with('success', 'Status Pesanan Berhasil Diperbarui !');
    }

    // ------------------------------------------------------------------------- user
    public function store(Request $request) {
        // dd($request);
        $produk = Produk::find($request->produk_id);

        $request->validate([
            'jumlah' => 'required|min:0|max:'.$produk->stok,
            'total' => 'required',
            'alamat' => 'required',
        ]);

        $pemesanan = new Pembelian();
        $pemesanan->user_id = auth()->user()->id;
        $pemesanan->produk_id = $produk->id;
        $pemesanan->harga = $produk->harga;
        $pemesanan->jumlah = $request->jumlah;
        $pemesanan->total = $request->total;
        $pemesanan->alamat = $request->alamat;
        $pemesanan->pesan = $request->pesan;
        $pemesanan->status_pembayaran = 'belum bayar';
        $pemesanan->status_pesanan = 'menunggu pembayaran';

        if ($pemesanan->save()) {

            $externalId = 'ORDER-'.$pemesanan->id;

            $response = Http::withBasicAuth(
                config('services.xendit.secret_key'),
                ''
            )->post(
                'https://api.xendit.co/v2/invoices',
                    [
                        'external_id' => $externalId,
                        'amount' => $pemesanan->total,
                        'payer_email' => auth()->user()->email,
                        'description' => 'Pembelian Produk',
                        'payment_methods' => [
                            'QRIS'
                        ],
                        'success_redirect_url' => url('/pesanan'),
                        'failure_redirect_url' => url('/pesanan'),
                    ]
            );

            $invoice = $response->json();

            $pemesanan->update([
                'external_id' => $externalId,
                'invoice_id' => $invoice['id'],
                'invoice_url' => $invoice['invoice_url']
            ]);

            return redirect($invoice['invoice_url']);
        }
    }

    public function webhook(Request $request){
        $pembelian = Pembelian::where(
            'external_id',
            $request->external_id
        )->first();

        if (!$pembelian) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        if (
            $request->status == 'PAID'
            && $pembelian->status_pembayaran == 'belum bayar'
        ) {

            $pembelian->update([
                'status_pembayaran' => 'sudah bayar',
                'status_pesanan' => 'dikemas',
            ]);

            $pembelian->produk->decrement(
                'stok',
                $pembelian->jumlah
            );
        }

        return response()->json([
            'success' => true
        ]);
    }

    public function payment($id)
    {
        $pembelian = Pembelian::findOrFail($id);

        // Cegah bayar ulang
        if ($pembelian->status_pembayaran == 'sudah bayar') {
            return back()->with('error', 'Pesanan sudah dibayar');
        }

        // Kalau invoice sudah pernah dibuat
        if ($pembelian->invoice_url) {
            return redirect($pembelian->invoice_url);
        }

        $externalId = 'ORDER-' . $pembelian->id;

        $response = Http::withBasicAuth(
            config('services.xendit.secret_key'),
            ''
        )->post(
            'https://api.xendit.co/v2/invoices',
            [
                'external_id' => $externalId,
                'amount' => $pembelian->total,
                'payer_email' => $pembelian->user->email,
                'description' => 'Pembelian Produk',
                'payment_methods' => [
                    'QRIS'
                ],
                'success_redirect_url' => url('/pesanan'),
                'failure_redirect_url' => url('/pesanan'),
            ]
        );

        if (!$response->successful()) {
            return back()->with('error', 'Gagal membuat invoice');
        }

        $invoice = $response->json();

        $pembelian->update([
            'external_id' => $externalId,
            'invoice_id' => $invoice['id'],
            'invoice_url' => $invoice['invoice_url'],
        ]);

        return redirect($invoice['invoice_url']);
    }

    public function update($id, Request $request) {
        $request->validate([
            'bukti_pembayaran' => 'required',
        ]);

        $pesanan = Pembelian::find($id);
        $data = $request->except('token', 'submit', 'bukti_pembayaran');

        $image = $request->file('bukti_pembayaran');
        $imageName = $pesanan->created_at->format('ymdHis') . '_' . $pesanan->produk->nama_produk . '_' . auth()->user()->name . '.' . $image->extension();
        $image->move(public_path('assets/img/bukti-pembayaran/'), $imageName);
        $data['bukti_pembayaran'] = $imageName;

        $pesanan->update([
            'bukti_pembayaran' => $imageName,
            'status_pembayaran' => 'sudah bayar',
        ]);

        return redirect('/pesanan')->with('success', 'Bukti pembayaran berhasil diunggah!');
    }

    public function edit_data_terima($id) {
        $pesanan = Pembelian::find($id);
        $pesanan->update([
            'status_pesanan' => 'selesai',
        ]);

        return redirect('/pesanan#selesai')->with('success', 'Status Pesanan Berhasil Diperbarui !');
    }

    
    public function payment_cancel($id) {
        $pesanan = Pembelian::find($id);
        $pesanan->update([
            'status_pesanan' => 'dibatalkan',
        ]);

        return redirect('/pesanan#dibatalkan')->with('success', 'Status Pesanan Berhasil Diperbarui !');
    }

}
