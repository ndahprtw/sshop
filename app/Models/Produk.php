<?php

namespace App\Models;

use App\Models\Pabrik;
use App\Models\Pembelian;
use App\Models\KategoriProduk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'produks';
    protected $guarded = ['id'];

    public function brand() {
        return $this->belongsTo(Pabrik::class, 'toko_id', 'id');
    }

    public function kategori() {
        return $this->belongsTo(KategoriProduk::class, 'kategori_id', 'id');
    }

    public function pembelian() {
        return $this->hasMany(Pembelian::class, 'id');
    }
}
