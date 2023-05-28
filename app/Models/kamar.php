<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kamar extends Model
{
    use HasFactory;

    protected $guarded =['id'];

    public function scopeFilter($query, array $filters){


        $query->when($filters['check_in'] ?? false, function($query, $check_in){
            $tanggal = date('Y-m-d', strtotime($check_in));
            return $query->whereDate('kamars.check_in', '=', $tanggal);
        });

        $query->when($filters['deskripsi'] ?? false, function($query, $desk){
            return $query->whereHas('produk', function($query) use ($desk){
                $query->where('produks.deskripsi', 'like', $desk);
            });
        });

        $query->whereDate('kamars.check_in', '>=', now()->toDateString());
        $query->where('kamars.jumlah', '>', 0);


    }

    public function produk(){
        return $this->belongsTo(produk::class);
    }

    public function booking(){
        return $this->hasMany(booking::class);
    }
}
