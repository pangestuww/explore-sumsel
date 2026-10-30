<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budaya extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
        'deskripsi_bawah', // Ditambahkan untuk fitur deskripsi bawah
        'gambar',
        'kabupaten_id',
        'kategori',
        'link_maps',
        'latitude',
        'longitude',
        'harga_tiket',
        'jam_buka',
        'waktu_terbaik'
    ];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
