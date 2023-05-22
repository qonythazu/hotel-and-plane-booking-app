<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters){
        $query->when($filters['check_in'] ?? false, function($query, $check_in){
            $tanggal = date('Y-m-d', strtotime($check_in));
            return $query->whereDate('jadwals.tgl_pergi', '=', $tanggal);

        });

        $query->when($filters['kota_asal'] ?? false, function($query, $kotaasal){
            return $query->whereHas('produk', function($query) use ($kotaasal){
                $query->where('jadwals.kota_asal', 'like', $kotaasal);
            });
        });

        $query->when($filters['kota_tiba'] ?? false, function($query, $kotatiba){
            return $query->whereHas('produk', function($query) use ($kotatiba){
                $query->where('jadwals.kota_tiba', 'like', $kotatiba);
            });
        });
    }

    public function produk(){
        return $this->belongsTo(produk::class);
    }
}
