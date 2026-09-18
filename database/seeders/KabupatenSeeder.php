<?php

namespace Database\Seeders;

use App\Models\Kabupaten;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KabupatenSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'Palembang', 'latitude' => -2.9761, 'longitude' => 104.7754],
            ['nama' => 'Ogan Komering Ilir', 'latitude' => -3.4167, 'longitude' => 105.0000],
            ['nama' => 'Muara Enim', 'latitude' => -3.6500, 'longitude' => 103.7667],
            ['nama' => 'Lahat', 'latitude' => -3.7833, 'longitude' => 103.5333],
            ['nama' => 'Musi Banyuasin', 'latitude' => -2.8833, 'longitude' => 103.7333],
            ['nama' => 'Pagar Alam', 'latitude' => -4.0217, 'longitude' => 103.2522],
            ['nama' => 'Lubuklinggau', 'latitude' => -3.2966, 'longitude' => 102.8615],
            ['nama' => 'Prabumulih', 'latitude' => -3.4342, 'longitude' => 104.2357],
            ['nama' => 'OKU Selatan', 'latitude' => -4.6167, 'longitude' => 103.8500],
            ['nama' => 'OKU Timur', 'latitude' => -3.9500, 'longitude' => 104.7500],
        ];

        foreach ($data as $item) {
            Kabupaten::create([
                'nama' => $item['nama'],
                'slug' => Str::slug($item['nama']),
                'deskripsi' => 'Kabupaten/Kota ' . $item['nama'] . ' di Sumatera Selatan.',
                'latitude' => $item['latitude'],
                'longitude' => $item['longitude'],
            ]);
        }
    }
}
