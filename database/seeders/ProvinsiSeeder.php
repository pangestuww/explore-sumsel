<?php

namespace Database\Seeders;

use App\Models\Provinsi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProvinsiSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'Aceh',                      'lat' => 5.5483,   'lng' => 95.3238],
            ['nama' => 'Sumatera Utara',            'lat' => 2.1154,   'lng' => 99.5451],
            ['nama' => 'Sumatera Barat',            'lat' => -0.7399,  'lng' => 100.8000],
            ['nama' => 'Riau',                      'lat' => 0.2933,   'lng' => 101.7068],
            ['nama' => 'Kepulauan Riau',            'lat' => 3.9456,   'lng' => 108.1428],
            ['nama' => 'Jambi',                     'lat' => -1.6101,  'lng' => 103.6131],
            ['nama' => 'Sumatera Selatan',          'lat' => -3.3194,  'lng' => 103.9144],
            ['nama' => 'Kepulauan Bangka Belitung', 'lat' => -2.7410,  'lng' => 106.4406],
            ['nama' => 'Bengkulu',                  'lat' => -3.7928,  'lng' => 102.2608],
            ['nama' => 'Lampung',                   'lat' => -4.5585,  'lng' => 105.4068],
        ];

        foreach ($data as $p) {
            Provinsi::updateOrCreate(
                ['nama' => $p['nama']],
                [
                    'slug' => Str::slug($p['nama']),
                    'latitude' => $p['lat'],
                    'longitude' => $p['lng'],
                ]
            );
        }
    }
}
