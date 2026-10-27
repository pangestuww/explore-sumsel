<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorit extends Model
{
    use HasFactory;

    // Tambahkan budaya_id dan kuliner_id di sini
    protected $fillable = [
        'user_id',
        'destinasi_id',
        'budaya_id',
        'kuliner_id',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Destinasi
    public function destinasi()
    {
        return $this->belongsTo(Destinasi::class);
    }

    // Tambahkan Relasi ke Budaya
    public function budaya()
    {
        return $this->belongsTo(Budaya::class);
    }

    // Tambahkan Relasi ke Kuliner
    public function kuliner()
    {
        return $this->belongsTo(Kuliner::class);
    }
}
