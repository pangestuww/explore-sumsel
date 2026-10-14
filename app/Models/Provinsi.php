<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'slug',
        'pulau',
        'latitude',
        'longitude',
    ];

    // Relasi ke Kabupaten
    public function kabupatens()
    {
        return $this->hasMany(Kabupaten::class);
    }

    // Relasi ke Destinasi via Kabupaten
    public function destinasis()
    {
        return $this->hasManyThrough(Destinasi::class, Kabupaten::class);
    }
}
