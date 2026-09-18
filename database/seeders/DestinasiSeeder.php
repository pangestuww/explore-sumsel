<?php

namespace Database\Seeders;

use App\Models\Destinasi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DestinasiSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // ============ PALEMBANG (id: 1) ============
            [
                'kabupaten_id' => 1,
                'nama' => 'Jembatan Ampera',
                'kategori' => 'budaya',
                'harga_tiket' => 0,
                'rating' => 4.8,
                'deskripsi' => 'Ikon kota Palembang yang membentang di atas Sungai Musi. Dibangun tahun 1965, jembatan ini menjadi simbol kebanggaan warga Sumatera Selatan.',
                'gambar' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=1200&q=80',
            ],
            [
                'kabupaten_id' => 1,
                'nama' => 'Benteng Kuto Besak',
                'kategori' => 'budaya',
                'harga_tiket' => 5000,
                'rating' => 4.6,
                'deskripsi' => 'Benteng peninggalan Kesultanan Palembang Darussalam yang dibangun abad ke-18. Terletak di tepi Sungai Musi.',
                'gambar' => 'https://images.unsplash.com/photo-1590247813693-5541d1c609fd?w=800&q=80',
            ],
            [
                'kabupaten_id' => 1,
                'nama' => 'Masjid Agung Palembang',
                'kategori' => 'budaya',
                'harga_tiket' => 0,
                'rating' => 4.7,
                'deskripsi' => 'Masjid terbesar di Palembang dengan arsitektur megah bergaya Melayu-Islam. Menjadi ikon wisata religi di Sumsel.',
                'gambar' => 'https://images.unsplash.com/photo-1542816417-0983c9c9ad53?w=800&q=80',
            ],

            // ============ OKI (id: 2) ============
            [
                'kabupaten_id' => 2,
                'nama' => 'Danau Ranau',
                'kategori' => 'alam',
                'harga_tiket' => 10000,
                'rating' => 4.7,
                'deskripsi' => 'Danau vulkanik terbesar kedua di Sumatera. Terletak di perbatasan Sumsel dan Lampung, dikelilingi perbukitan hijau.',
                'gambar' => 'https://images.unsplash.com/photo-1439066615861-d1af74d74000?w=1200&q=80',
            ],

            // ============ MUARA ENIM (id: 3) ============
            [
                'kabupaten_id' => 3,
                'nama' => 'Air Terjun Suban',
                'kategori' => 'alam',
                'harga_tiket' => 7500,
                'rating' => 4.5,
                'deskripsi' => 'Air terjun alami dengan ketinggian sekitar 30 meter, dikelilingi hutan tropis yang masih asri.',
                'gambar' => 'https://images.unsplash.com/photo-1432405972618-c60b0225b8f9?w=800&q=80',
            ],

            // ============ LAHAT (id: 4) ============
            [
                'kabupaten_id' => 4,
                'nama' => 'Curup Maung',
                'kategori' => 'alam',
                'harga_tiket' => 15000,
                'rating' => 4.8,
                'deskripsi' => 'Air terjun megah setinggi 60 meter di kawasan Bukit Barisan. Suara gemuruhnya bisa terdengar dari kejauhan.',
                'gambar' => 'https://images.unsplash.com/photo-1508739773434-c26b3d09e071?w=800&q=80',
            ],
            [
                'kabupaten_id' => 4,
                'nama' => 'Air Terjun Lematang',
                'kategori' => 'alam',
                'harga_tiket' => 10000,
                'rating' => 4.5,
                'deskripsi' => 'Air terjun bertingkat di kawasan wisata Lematang Indah, cocok untuk bersantai dan berfoto.',
                'gambar' => 'https://images.unsplash.com/photo-1467890947394-8171244e5410?w=800&q=80',
            ],

            // ============ MUSI BANYUASIN (id: 5) ============
            [
                'kabupaten_id' => 5,
                'nama' => 'Taman Nasional Sembilang',
                'kategori' => 'alam',
                'harga_tiket' => 20000,
                'rating' => 4.6,
                'deskripsi' => 'Kawasan konservasi mangrove dan habitat alami harimau Sumatera. Salah satu taman nasional terpenting di Sumatera.',
                'gambar' => 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=800&q=80',
            ],

            // ============ PAGAR ALAM (id: 6) ============
            [
                'kabupaten_id' => 6,
                'nama' => 'Gunung Dempo',
                'kategori' => 'alam',
                'harga_tiket' => 20000,
                'rating' => 4.9,
                'deskripsi' => 'Gunung tertinggi di Sumatera Selatan dengan ketinggian 3.159 mdpl. Jadi favorit pendaki dari berbagai daerah.',
                'gambar' => 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?w=1200&q=80',
            ],
            [
                'kabupaten_id' => 6,
                'nama' => 'Kebun Teh Pagar Alam',
                'kategori' => 'alam',
                'harga_tiket' => 8000,
                'rating' => 4.7,
                'deskripsi' => 'Hamparan kebun teh hijau yang menyejukkan mata, terletak di kaki Gunung Dempo.',
                'gambar' => 'https://images.unsplash.com/photo-1523920290228-4f321a939b4c?w=800&q=80',
            ],

            // ============ LUBUKLINGGAU (id: 7) ============
            [
                'kabupaten_id' => 7,
                'nama' => 'Taman Bukit Sulap',
                'kategori' => 'alam',
                'harga_tiket' => 5000,
                'rating' => 4.4,
                'deskripsi' => 'Taman kota dengan pemandangan kota Lubuklinggau dari ketinggian. Cocok untuk sunset dan foto.',
                'gambar' => 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?w=800&q=80',
            ],

            // ============ PRABUMULIH (id: 8) ============
            [
                'kabupaten_id' => 8,
                'nama' => 'Kuliner Nanas Prabumulih',
                'kategori' => 'kuliner',
                'harga_tiket' => 0,
                'rating' => 4.6,
                'deskripsi' => 'Prabumulih terkenal sebagai kota nanas. Wisatawan bisa menikmati olahan nanas segar langsung dari kebunnya.',
                'gambar' => 'https://images.unsplash.com/photo-1550258987-190a2d41a8ba?w=800&q=80',
            ],

            // ============ OKU SELATAN (id: 9) ============
            [
                'kabupaten_id' => 9,
                'nama' => 'Danau Ranau OKU Selatan',
                'kategori' => 'alam',
                'harga_tiket' => 5000,
                'rating' => 4.5,
                'deskripsi' => 'Sisi selatan Danau Ranau dengan pemandangan perbukitan dan udara sejuk pegunungan.',
                'gambar' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&q=80',
            ],

            // ============ OKU TIMUR (id: 10) ============
            [
                'kabupaten_id' => 10,
                'nama' => 'Air Terjun Sukamaju',
                'kategori' => 'alam',
                'harga_tiket' => 6000,
                'rating' => 4.3,
                'deskripsi' => 'Air terjun tersembunyi di tengah perkebunan karet OKU Timur.',
                'gambar' => 'https://images.unsplash.com/photo-1509316785289-025f5b846b35?w=800&q=80',
            ],
        ];

        foreach ($data as $item) {
            Destinasi::create([
                'kabupaten_id' => $item['kabupaten_id'],
                'nama' => $item['nama'],
                'slug' => Str::slug($item['nama']),
                'deskripsi' => $item['deskripsi'],
                'gambar' => $item['gambar'],
                'harga_tiket' => $item['harga_tiket'],
                'rating' => $item['rating'],
                'kategori' => $item['kategori'],
            ]);
        }
    }
}
