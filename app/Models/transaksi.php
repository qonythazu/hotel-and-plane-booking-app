<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters){

        $query->when($filters['username'] ?? false, function($query, $username){
            return $query->whereHas('User', function($query) use ($username){
                $query->where('name', 'like', "%" . $username . "%");
            });
        });
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
