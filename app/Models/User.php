<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'photo',   // 🌟 Tambahkan ini
        'job',     // 🌟 Tambahkan ini
        'address', // 🌟 Tambahkan ini
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Helper: cek admin
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    // Relasi: user punya banyak review
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Relasi: user punya banyak favorit
    public function favorits()
    {
        return $this->hasMany(Favorit::class);
    }
}
