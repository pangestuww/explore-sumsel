<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuliner extends Model
{
    use HasFactory;

    protected $fillable = ['kabupaten_id', 'nama', 'slug', 'deskripsi', 'gambar', 'harga', 'jenis'];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }
}
