<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuliner extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jenis',
        'kabupaten_id',
        'harga',
        'deskripsi',
        'gambar',
        'link_maps',
        'latitude',
        'longitude' // <-- Pastikan ini ada
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
