<?php

namespace App\Services;

class FeedbackModerationService
{
    public function check(string $message): array
    {
        $text = strtolower($message);

        $gamblingKeywords = [
            'slot gacor',
            'judi online',
            'judol',
            'togel',
            'situs slot',
            'deposit slot',
            'jackpot',
            'link slot',
            'casino online',
            'taruhan online',
            'poker online',
        ];

        $spamKeywords = [
            'klik link ini',
            'daftar sekarang',
            'bonus gratis',
            'promo terbatas',
            'hubungi wa',
            'pinjaman cepat',
            'investasi pasti untung',
        ];

        foreach ($gamblingKeywords as $keyword) {
            if (str_contains($text, $keyword)) {
                return [
                    'is_spam' => true,
                    'reason' => 'Indikasi promosi judi online',
                ];
            }
        }

        foreach ($spamKeywords as $keyword) {
            if (str_contains($text, $keyword)) {
                return [
                    'is_spam' => true,
                    'reason' => 'Indikasi pesan promosi spam',
                ];
            }
        }

        return [
            'is_spam' => false,
            'reason' => null,
        ];
    }
}
