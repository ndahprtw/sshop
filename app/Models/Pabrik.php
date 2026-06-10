<?php

namespace App\Models;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pabrik extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'pabriks';
    protected $guarded = ['id'];
    // protected $primaryKey = ['id'];

    public function produk()
    {
        return $this->hasMany(Produk::class, 'toko_id');
    }
}
