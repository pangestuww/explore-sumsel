<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewReviewNotification extends Notification
{
    use Queueable;

    public $review;

    public function __construct($review)
    {
        $this->review = $review;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        // 🌟 Cek otomatis, ini ulasan buat apa?
        $nama_konten = 'konten';
        $link = '#';

        if ($this->review->destinasi_id) {
            $nama_konten = 'destinasi ' . $this->review->destinasi->nama;
            $link = route('destinasi.show', $this->review->destinasi->slug);
        } elseif ($this->review->budaya_id) {
            $nama_konten = 'budaya ' . $this->review->budaya->nama;
            $link = route('budaya.show', $this->review->budaya->slug);
        } elseif ($this->review->kuliner_id) {
            $nama_konten = 'kuliner ' . $this->review->kuliner->nama;
            $link = route('kuliner.show', $this->review->kuliner->slug);
        }

        return [
            'type' => 'review_baru',
            'title' => 'Ulasan Baru: ' . $this->review->user->name,
            'message' => 'Memberi ulasan pada ' . $nama_konten,
            'url' => $link
        ];
    }
}
