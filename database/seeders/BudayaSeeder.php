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
                'gambar' => 'https://images.unsplash.com/photo-1583417319070-4a69db38a482?w=800&q=80',
            ],
            [
                'kabupaten_id' => 1,
                'nama' => 'Kain Songket Palembang',
                'jenis' => 'pakaian',
                'deskripsi' => 'Kain tenun tradisional dengan benang emas yang menjadi kebanggaan Palembang. Setiap motif memiliki makna filosofis.',
                'gambar' => 'https://images.unsplash.com/photo-1594736797933-d0501ba2fe65?w=800&q=80',
            ],
            [
                'kabupaten_id' => 1,
                'nama' => 'Tari Gending Sriwijaya',
                'jenis' => 'tari',
                'deskripsi' => 'Tari penyambutan tamu kehormatan yang menggambarkan kejayaan Kerajaan Sriwijaya. Ditarikan oleh 9 penari perempuan.',
                'gambar' => 'https://images.unsplash.com/photo-1518611012118-696072aa579a?w=800&q=80',
            ],
            [
                'kabupaten_id' => 1,
                'nama' => 'Keris Palembang',
                'jenis' => 'senjata',
                'deskripsi' => 'Senjata tradisional dengan bilah berlekuk dan ukiran khas Palembang. Dianggap memiliki kekuatan spiritual.',
                'gambar' => 'https://images.unsplash.com/photo-1589994965851-a8f479c573a9?w=800&q=80',
            ],
            [
                'kabupaten_id' => 1,
                'nama' => 'Tari Tanggai',
                'jenis' => 'tari',
                'deskripsi' => 'Tari tradisional Palembang yang ditarikan untuk menyambut tamu. Penari mengenakan kuku panjang dari emas.',
                'gambar' => 'https://images.unsplash.com/photo-1508700115892-45ecd05ae2ad?w=800&q=80',
            ],
            [
                'kabupaten_id' => 1,
                'nama' => 'Rumah Rakit',
                'jenis' => 'rumah_adat',
                'deskripsi' => 'Rumah tradisional yang dibangun di atas air Sungai Musi. Menjadi ciri khas pemukiman tepi sungai Palembang.',
                'gambar' => 'https://images.unsplash.com/photo-1528181304800-259b08848526?w=800&q=80',
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
