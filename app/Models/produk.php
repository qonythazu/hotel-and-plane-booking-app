<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function booking(){
        return $this->hasMany(booking::class);
    }

    public function jadwal(){
        return $this->hasMany(jadwal::class);
    }

    public function kamar(){
        return $this->hasMany(kamar::class);
    }

    public function jenis(){
        return $this->belongsTo(jenis::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
