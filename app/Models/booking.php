<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
    'user_id', 'produk_id', 'kamar_id', 'jadwal_id', 'nama_pemesan', 'nomor_hp', 'tanggal', 'qty', 'deskripsi', 'total_harga', 'status'
    ];

    public function produk(){
        return $this->belongsTo(produk::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function kamar(){
        return $this->belongsTo(kamar::class);
    }

    public function jadwal(){
        return $this->belongsTo(jadwal::class);
    }



}
