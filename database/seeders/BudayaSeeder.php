<?php

namespace Database\Seeders;

use App\Models\Budaya;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BudayaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'kabupaten_id' => 1,
                'nama' => 'Rumah Limas',
                'jenis' => 'rumah_adat',
                'deskripsi' => 'Rumah adat tradisional Sumatera Selatan dengan atap berbentuk limas dan ukiran khas. Menjadi simbol kebesaran budaya Palembang.',
                'gambar' => 'https://indonesiakaya.com/wp-content/uploads/2020/10/rumah_limas_1200.jpg',
            ],
            [
                'kabupaten_id' => 1,
                'nama' => 'Kain Songket Palembang',
                'jenis' => 'pakaian',
                'deskripsi' => 'Kain tenun tradisional dengan benang emas yang menjadi kebanggaan Palembang. Setiap motif memiliki makna filosofis.',
                'gambar' => 'https://enimekspres.disway.id/upload/1511e0f8a80195be986ba99673d0bdca.jpg',
            ],
            [
                'kabupaten_id' => 1,
                'nama' => 'Tari Gending Sriwijaya',
                'jenis' => 'tari',
                'deskripsi' => 'Tari penyambutan tamu kehormatan yang menggambarkan kejayaan Kerajaan Sriwijaya. Ditarikan oleh 9 penari perempuan.',
                'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRLsAJTXjkFgctkPJNAmJB5hF9iWRjurTXGd_hSHgj9szuWY2kZFwQF9OUA&s=10',
            ],
            [
                'kabupaten_id' => 1,
                'nama' => 'Keris Palembang',
                'jenis' => 'senjata',
                'deskripsi' => 'Senjata tradisional dengan bilah berlekuk dan ukiran khas Palembang. Dianggap memiliki kekuatan spiritual.',
                'gambar' => 'https://ik.imgkit.net/tvlk/dam/i/01kma48j4kka3stpc6dahmmzc7.jpeg',
            ],
            [
                'kabupaten_id' => 1,
                'nama' => 'Tari Tanggai',
                'jenis' => 'tari',
                'deskripsi' => 'Tari tradisional Palembang yang ditarikan untuk menyambut tamu. Penari mengenakan kuku panjang dari emas.',
                'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWRqpz0nq9G-d3wHU76q4rifQBV4OMJ_ZX4ipe6DNGtxKnSRjNOEHcPbY&s=10',
            ],
            [
                'kabupaten_id' => 1,
                'nama' => 'Rumah Rakit',
                'jenis' => 'rumah_adat',
                'deskripsi' => 'Rumah tradisional yang dibangun di atas air Sungai Musi. Menjadi ciri khas pemukiman tepi sungai Palembang.',
                'gambar' => 'https://www.indonesia.travel/contentassets/a8fdd83c14a94f9893161b211ad3ff8a/floating-raft-house.jpg',
            ],
        ];

        foreach ($data as $item) {
            Budaya::create([
                'kabupaten_id' => $item['kabupaten_id'],
                'nama' => $item['nama'],
                'slug' => Str::slug($item['nama']),
                'deskripsi' => $item['deskripsi'],
                'gambar' => $item['gambar'],
                'jenis' => $item['jenis'],
            ]);
        }
    }
}
