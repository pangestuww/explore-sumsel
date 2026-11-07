<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subject',
        'message',
        'is_read',
        'is_spam',
        'spam_reason',
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'is_spam' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
