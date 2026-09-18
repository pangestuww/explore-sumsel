<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'slug', 'deskripsi', 'gambar', 'latitude', 'longitude'];

    public function destinasis()
    {
        return $this->hasMany(Destinasi::class);
    }

    public function budayas()
    {
        return $this->hasMany(Budaya::class);
    }

    public function kuliners()
    {
        return $this->hasMany(Kuliner::class);
    }
}
