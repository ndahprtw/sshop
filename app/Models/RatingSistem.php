<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RatingSistem extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'rating_sistems';
    protected $guarded = ['id'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
