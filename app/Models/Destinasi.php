<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kabupaten_id',
        'nama',
        'slug',
        'deskripsi',
        'gambar',
        'harga_tiket',
        'rating',
        'kategori',
        'latitude',
        'longitude',
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
