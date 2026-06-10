<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AliranBarang extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'aliran_barangs';
    protected $guarded = ['id'];

    public function produk() {
        return $this->belongsTo(Produk::class, 'produk_id', 'id');
    }
}
