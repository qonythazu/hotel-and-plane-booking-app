<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded =['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function booking(){
        return $this->hasMany(booking::class);
    }

    public function produk(){
        return $this->hasMany(produk::class);
    }

    public function historytransaksi(){
        return $this->hasMany(HistoryTransaksi::class);
    }

    public function transaksi(){
        return $this->hasOne(transaksi::class);
    }

    public function role(){
        return $this->belongsTo(role::class);
    }
}
