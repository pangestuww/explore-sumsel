<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'destinasi_id',
        'budaya_id',
        'kuliner_id',
        'rating',
        'komentar', // Sesuaikan jika nama kolom di database kamu 'body' atau 'review'
    ];

    // 🌟 INI YANG HILANG TADI (Relasi ke User) 🌟
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Destinasi
    public function destinasi()
    {
        return $this->belongsTo(Destinasi::class);
    }

    // Relasi ke Budaya
    public function budaya()
    {
        return $this->belongsTo(Budaya::class);
    }

    // Relasi ke Kuliner
    public function kuliner()
    {
        return $this->belongsTo(Kuliner::class);
    }
}
