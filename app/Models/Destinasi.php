<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
        'deskripsi_bawah',
        'gambar',
        'kabupaten_id',
        'kategori',
        'jenis',
        'harga_tiket',
        'jam_buka',
        'waktu_terbaik', // <-- Tambahkan ini
        'link_maps',
        'latitude',
        'longitude'
    ];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // 🌟 TAMBAHKAN INI: Untuk hitung rata-rata rating otomatis 🌟
    public function getAverageRatingAttribute()
    {
        // Kalau ada ulasan, hitung rata-rata. Kalau kosong, tampilkan 0.0
        return $this->reviews->count() > 0
            ? number_format($this->reviews->avg('rating'), 1)
            : '0.0';
    }
}
