<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'user_id', 'produk_id', 'nama_pemesan', 'nomor_hp', 'tanggal', 'total_harga', 'status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function produk(){
        return $this->belongsTo(produk::class);
    }



}
