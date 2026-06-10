<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriProduk extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'kategori_produks';
    protected $guarded = ['id'];

    public function produk()
    {
        return $this->hasMany(Produk::class, 'kategori_id');
    }
}
