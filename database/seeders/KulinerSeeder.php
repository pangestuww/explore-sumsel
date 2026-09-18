<?php

namespace Database\Seeders;

use App\Models\Kuliner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KulinerSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'kabupaten_id' => 1,
                'nama' => 'Pempek',
                'jenis' => 'makanan',
                'harga' => 15000,
                'deskripsi' => 'Makanan ikonik Palembang berbahan dasar ikan dan tepung, disajikan dengan kuah cuko yang khas asam pedas manis.',
                'gambar' => 'https://images.unsplash.com/photo-1555126634-323283e090fa?w=800&q=80',
            ],
            [
                'kabupaten_id' => 1,
                'nama' => 'Tekwan',
                'jenis' => 'makanan',
                'harga' => 12000,
                'deskripsi' => 'Sup ikan khas Palembang dengan bola-bola ikan, soun, dan kuah kaldu udang yang gurih.',
                'gambar' => 'https://images.unsplash.com/photo-1569718212165-3a8278d5f624?w=800&q=80',
            ],
            [
                'kabupaten_id' => 1,
                'nama' => 'Model Ikan',
                'jenis' => 'makanan',
                'harga' => 13000,
                'deskripsi' => 'Mirip tekwan tapi dengan isian tahu dan kuah kuning yang lebih kental. Kuliner khas Palembang.',
                'gambar' => 'https://images.unsplash.com/photo-1547592180-85f173990554?w=800&q=80',
            ],
            [
                'kabupaten_id' => 1,
                'nama' => 'Kemplang',
                'jenis' => 'snack',
                'harga' => 8000,
                'deskripsi' => 'Kerupuk ikan khas Palembang yang digoreng atau dibakar. Renyah dan gurih, cocok jadi oleh-oleh.',
                'gambar' => 'https://images.unsplash.com/photo-1599490659213-e2b9527bd087?w=800&q=80',
            ],
            [
                'kabupaten_id' => 1,
                'nama' => 'Es Kacang Merah',
                'jenis' => 'minuman',
                'harga' => 10000,
                'deskripsi' => 'Minuman segar khas Palembang dengan kacang merah, kolang-kaling, dan sirop manis.',
                'gambar' => 'https://images.unsplash.com/photo-1497534446932-c925b458314e?w=800&q=80',
            ],
            [
                'kabupaten_id' => 1,
                'nama' => 'Mie Celor',
                'jenis' => 'makanan',
                'harga' => 15000,
                'deskripsi' => 'Mie dengan kuah santan dan udang khas Palembang. Biasanya disajikan dengan telur rebus.',
                'gambar' => 'https://images.unsplash.com/photo-1569562211093-4ed0d0758f12?w=800&q=80',
            ],
            [
                'kabupaten_id' => 1,
                'nama' => 'Laksan',
                'jenis' => 'makanan',
                'harga' => 13000,
                'deskripsi' => 'Olahan ikan dan tepung sagu yang disiram kuah santan. Makanan khas Palembang yang wajib dicoba.',
                'gambar' => 'https://images.unsplash.com/photo-1559847844-5315695dadae?w=800&q=80',
            ],
            [
                'kabupaten_id' => 1,
                'nama' => 'Martabak Har',
                'jenis' => 'makanan',
                'harga' => 20000,
                'deskripsi' => 'Martabak telur khas Palembang yang disajikan dengan kuah kari. Perpaduan unik India-Melayu.',
                'gambar' => 'https://images.unsplash.com/photo-1619221882220-947b3d3c8861?w=800&q=80',
            ],
            [
                'kabupaten_id' => 1,
                'nama' => 'Pindang Pegagan',
                'jenis' => 'makanan',
                'harga' => 25000,
                'deskripsi' => 'Ikan pindang khas Sumsel dengan bumbu kuning pedas dan sayuran pegagan.',
                'gambar' => 'https://images.unsplash.com/photo-1539755530862-00f623c00f52?w=800&q=80',
            ],
        ];

        foreach ($data as $item) {
            Kuliner::create([
                'kabupaten_id' => $item['kabupaten_id'],
                'nama' => $item['nama'],
                'slug' => Str::slug($item['nama']),
                'deskripsi' => $item['deskripsi'],
                'gambar' => $item['gambar'],
                'harga' => $item['harga'],
                'jenis' => $item['jenis'],
            ]);
        }
    }
}
