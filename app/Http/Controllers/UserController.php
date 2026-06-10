<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pabrik;
use App\Models\Produk;
use App\Models\Setting;
use App\Models\Carousel;
use App\Models\Pembelian;
use App\Models\RatingSistem;
use Illuminate\Http\Request;
use App\Models\KategoriProduk;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // LANDING PAGE
    public function index() {
        $brand = Pabrik::orderBy('nama_pabrik')->get();
        $kategori = KategoriProduk::orderBy('nama_kategori')->get();
        // $ulasan_sistem = RatingSistem::where('rating', 5)->limit(5);
        $ulasan_sistem = RatingSistem::all();
        $produk_terlaris = Pembelian::select('produk_id', DB::raw('SUM(jumlah) as total_penjualan'))
                            ->whereYear('created_at', now()->year)
                            ->whereMonth('created_at', now()->month)
                            ->groupBy('produk_id')
                            ->orderByDesc('total_penjualan')
                            ->take(3)
                            ->get();
        $produk_ids = $produk_terlaris->pluck('produk_id');
        $produk = Produk::whereIn('id', $produk_ids)->get();
        $setting = Setting::where('id', 1)->first();
        $carousel = Carousel::where('id', 1)->first();
        $carousels = Carousel::where('id','!=', 1)->get();
        return view('index', compact('brand', 'kategori', 'ulasan_sistem', 'produk', 'setting', 'carousel', 'carousels')); 
    }

    // REGISTER
    public function register(Request $request) {
        // dd($request);    
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'tanggal_lahir' => 'required',
            'gender' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'profile' => 'required',
            'password' => 'required',
        ]);

        $profile = $request->file('profile');
        $imageName = $request->email .'.' . $profile->extension();
        $profile->move(public_path('assets/img/user/'), $imageName);

        $user = new User();
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->profile = $imageName;
        $user->gender = $request->gender;
        $user->phone_number = $request->telepon;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->address = $request->alamat;
        $user->password = Hash::make($request->password);
        $user->role = 'user';

        if ($user->save()) {
            return redirect('/login')->with('success', 'Data berhasil disimpan! Silahkan Login!');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data');
        }
    }

    // PROFILE
    public function view_profile() {
        $user = Auth::user();
        return view('pages.user.profile', compact('user'));
    }

    public function update_profile($id, Request $request) {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'tanggal_lahir' => 'required',
        ], [
            'name.required' => 'Kolom Nama harus diisi.',
            'email.required' => 'Kolom Email harus diisi.',
            'email.email' => 'Format Email tidak valid.',
            'gender.required' => 'Kolom Jenis Kelamin harus diisi.',
            'phone_number.required' => 'Kolom Telepon harus diisi.',
            'address.required' => 'Kolom Alamat harus diisi.',
            'tanggal_lahir.required' => 'Kolom Tanggal Lahir harus diisi.',
        ]);

        $data = DB::table('users')
        ->where('id', $id)
        ->update([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        if ($data) {
            return redirect()->back()->with('success', 'Profile Berhasil Diupdate!');
        } else {
            return redirect()->back()->with('error', 'Gagal mengupdate data');
        }
    }

    public function update_password($id, Request $request) {

        $request->validate([
            'password' => 'required',
            'new_password' => 'required',
        ], [
            'password.required' => 'Kolom Password harus diisi.',
            'new_password.required' => 'Kolom Password Baru harus diisi.',
        ]);

        $staff = DB::table('users')->where('id', $id)->first();

        if (!Hash::check($request->password, $staff->password)) {
            return redirect()->back()->with('error', 'Password Lama Tidak Sesuai !');
        }
    

        $data = DB::table('users')
        ->where('id', $id)
        ->update([
            'password' => Hash::make($request->new_password),
        ]);

        if ($data) {
            return redirect()->back()->with('success', 'Password Berhasil Diupdate !');
        } else {
            return redirect()->back()->with('error', 'Gagal mengupdate password !');
        }
    }

    public function update_image($id, Request $request) {

        $request->validate([
            'profile' => 'required',
        ], [
            'profile.required' => 'Kolom Nama harus diisi.',
        ]);

        if (auth()->user()->profile != null) {
            if (auth()->user()->profile && file_exists(public_path('assets/img/user/' . auth()->user()->profile))) {
                unlink(public_path('assets/img/user/' . auth()->user()->profile));
            }
        }

        $profileImage = $request->file('profile');
        $imageName = auth()->user()->id . '_' . auth()->user()->email . '.' . $profileImage->extension();
        $profileImage->move(public_path('assets/img/user/'), $imageName);

        $data = DB::table('users')
        ->where('id', $id)
        ->update([
            'profile' => $imageName,
        ]);

        if ($data) {
            return redirect()->back()->with('success', 'Profile Berhasil Diupdate!');
        } else {
            return redirect()->back()->with('error', 'Gagal mengupdate data');
        }
    }

    // PESANAN
    public function view_pesanan() {
        $semua_pesanan = Pembelian::with('ratingProduk')->where('user_id', auth()->user()->id)->orderby('created_at')->get();
        $belum_bayar = Pembelian::where('user_id', auth()->user()->id)->where('status_pesanan', 'menunggu pembayaran')->orderby('created_at')->get();
        $dikemas = Pembelian::where('user_id', auth()->user()->id)->where('status_pesanan', 'dikemas')->orderby('created_at')->get();
        $dikirim = Pembelian::where('user_id', auth()->user()->id)->where('status_pesanan', 'dikirim')->orderby('created_at')->get();
        $selesai = Pembelian::where('user_id', auth()->user()->id)->where('status_pesanan', 'selesai')->orderby('created_at')->get();
        $dibatalkan = Pembelian::where('user_id', auth()->user()->id)->where('status_pesanan', 'dibatalkan')->orderby('created_at')->get();
        return view('pages.user.pesanan', compact('semua_pesanan', 'belum_bayar', 'dikemas', 'dikirim', 'selesai', 'dibatalkan'));
    }

    public function view_payment($id) {
        $pesanan = Pembelian::find($id);
        return view('pages.user.pesanan-payment', compact('pesanan'));
    }

    // RATING SISTEM
    public function view_rating() {
        return view('pages.user.rating-sistem');
    }

}
