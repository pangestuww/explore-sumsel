<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;

    protected $fillable = [
        'provinsi_id',
        'nama',
        'slug',
        'deskripsi',
        'gambar',
        'latitude',
        'longitude',
    ];

    // Relasi ke Provinsi
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }

    // Relasi ke Destinasi
    public function destinasis()
    {
        return $this->hasMany(Destinasi::class);
    }

    // Relasi ke Budaya
    public function budayas()
    {
        return $this->hasMany(Budaya::class);
    }

    // Relasi ke Kuliner
    public function kuliners()
    {
        return $this->hasMany(Kuliner::class);
    }
}
