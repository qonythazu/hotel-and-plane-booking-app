<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function detail_booking(){
        return $this->hasMany(detail_booking::class);
    }

    public function detail_produk(){
        return $this->hasMany(detail_produk::class);
    }

    public function jadwal(){
        return $this->hasMany(jadwal::class);
    }
}
