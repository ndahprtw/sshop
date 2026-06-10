<?php

namespace App\Models;

use App\Models\User;
use App\Models\Produk;
use App\Models\RatingProduk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembelian extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'pembelians';
    protected $guarded = ['id'];

    public function produk() {
        return $this->belongsTo(Produk::class, 'produk_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function ratingProduk()
    {
        return $this->hasOne(RatingProduk::class, 'pembelian_id', 'id');
    }

}
