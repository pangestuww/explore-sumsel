<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    // Tabel default Laravel untuk model ini adalah 'feedback' (uncountable noun)
    protected $fillable = ['user_id', 'subject', 'message', 'is_read'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}