<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewContentNotification extends Notification
{
    use Queueable;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function via($notifiable)
    {
        return ['database']; // Simpan ke database
    }

    public function toDatabase($notifiable)
    {
        return [
            'type' => 'konten_baru',
            'title' => 'Konten Baru: ' . $this->data['nama'],
            'message' => 'Admin baru saja menambahkan ' . $this->data['kategori'] . ' baru di ' . $this->data['kabupaten'],
            'url' => $this->data['url']
        ];
    }
}
