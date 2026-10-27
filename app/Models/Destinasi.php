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
    'kabupaten_id',
    'kategori',
    'jenis', // <-- INI WAJIB ADA
    'harga_tiket',
    'deskripsi',
    'gambar',
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
