<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AliranBarangController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PabrikController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// PENGUNJUNG -------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------ Landing Page
Route::get('/', [UserController::class, 'index']);
Route::get('/our-product', [PenjualanController::class, 'view_product']);
Route::get('/our-product/{id}', [PenjualanController::class, 'view_product_kategori']);


// Route::get('/register', function () { return view('Wali Murid.register'); });
// Route::post('/new-account', [WaliMuridController::class, 'new_account']);

// ------------------------------------------------------ Login Akun
Route::get('/login', function () { return view('pages.user.login'); })->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/register', function () { return view('pages.user.register'); });
Route::post('/register', [UserController::class, 'register']);

// Google Auth
Route::get('/auth/google', [GoogleController::class, 'redirect']);
Route::get('/auth/google/callback', [GoogleController::class, 'callback']);

// USER ------------------------------------------------------------------------------------------------------------------
Route::group(["middleware" => ["auth", 'cekrole:user']], function () {
    // ------------- profile
    Route::get('/profile', [UserController::class, 'view_profile']);
    Route::put('/update-profile/{id}', [UserController::class, 'update_profile']);
    Route::put('/update-password/{id}', [UserController::class, 'update_password']);
    Route::put('/update-image/{id}', [UserController::class, 'update_image']);
    
    // ------------- pesanan
    Route::get('/pesanan', [UserController::class, 'view_pesanan']);
    Route::get('/pesanan-terima/{id}', [PesananController::class, 'edit_data_terima']);
    Route::get('/cancel-payment/{id}', [PesananController::class, 'payment_cancel']);
    
    // -------------  produk
    Route::get('/detail-product/{id}', [PenjualanController::class, 'detail_product']);
    Route::get('/payment-product/{id}', [PenjualanController::class, 'payment_product']);
    
    // ------------- payment
    // Route::get('/payment/{id}', [UserController::class, 'view_payment']);
    Route::get('/payment/{id}', [PesananController::class, 'payment']);
    Route::post('/penjualan', [PesananController::class, 'store']);
    Route::put('/upload-payment/{id}', [PesananController::class, 'update']);
    
    // ------------- rating
    Route::get('/rating/{id}', [RatingController::class, 'create']);
    Route::post('/rating', [RatingController::class, 'store']);
    
    Route::get('/rating-sistem', [UserController::class, 'View_rating']);
    Route::post('/rating-sistem', [RatingController::class, 'store_sistem']);
});


// ADMIN -----------------------------------------------------------------------------------------------------------------
Route::group(["middleware" => ["auth", 'cekrole:admin']], function () {
    // ------------- dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);
    
    // ------------- pabrik
    Route::resource('/pabrik', PabrikController::class)->names('pabrik');
    
    // ------------- kategori
    Route::resource('/kategori', KategoriProdukController::class)->names('kategori');
    
    // ------------- produk
    Route::resource('/produk', ProdukController::class)->names('produk');
    
    // ------------- Data Barang
    Route::resource('/data-barang', AliranBarangController::class)->names('inventaris');
    
    // ------------- Data Barang
    Route::resource('/carousel', CarouselController::class)->names('carousel');
    
    // ------------- penjualan
    Route::get('/penjualan', [PesananController::class, 'index']);
    Route::get('/penjualan-detail/{id}', [PesananController::class, 'show']);
    Route::get('/penjualan-kemas/{id}', [PesananController::class, 'edit_data_kemas']);
    Route::get('/penjualan-kirim/{id}', [PesananController::class, 'edit_data_kirim']);
    
    // ------------- rating-sistem
    Route::get('/kritik-saran', [RatingController::class, 'index']);
    Route::delete('/kritik-saran/{id}', [RatingController::class, 'destroy']);

    // ------------- petugas
    Route::resource('/petugas', AdminController::class)->names('petugas');
    
    // ------------- setting
    Route::get('/setting', [SettingController::class, 'index']);
    Route::put('/setting/{id}', [SettingController::class, 'update']);
});

    Route::post('/xendit/webhook', [PesananController::class, 'webhook']);