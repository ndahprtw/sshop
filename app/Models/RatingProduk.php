<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RatingProduk extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'rating_produks';
    protected $guarded = ['id'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function pembelian() {
        return $this->belongsTo(Pembelian::class, 'pembelian_id', 'id');
    }
}
