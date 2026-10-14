<?php

namespace Database\Seeders;

use App\Models\Kuliner;
use App\Models\Kabupaten;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KulinerSeeder extends Seeder
{
    public function run(): void
    {
        $kab = function ($nama) {
            return Kabupaten::where('nama', $nama)->first()->id ?? null;
        };

        $data = [
            // ============ ACEH ============
            [
                'kabupaten' => 'Banda Aceh',
                'nama' => 'Mie Aceh',
                'deskripsi' => 'Mie kuning tebal dengan kuah rempah kari yang kaya, disajikan dengan daging sapi atau seafood.',
                'gambar' => 'https://images.unsplash.com/photo-1569718212165-3a8278d5f624?w=800&q=80',
                'harga' => 25000,
                'jenis' => 'makanan',
            ],
            [
                'kabupaten' => 'Banda Aceh',
                'nama' => 'Kopi Sanger',
                'deskripsi' => 'Kopi khas Aceh dicampur susu kental manis, disajikan panas atau dingin. Minuman wajib di Banda Aceh.',
                'gambar' => 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?w=800&q=80',
                'harga' => 15000,
                'jenis' => 'minuman',
            ],
            [
                'kabupaten' => 'Banda Aceh',
                'nama' => 'Timphan',
                'deskripsi' => 'Kue tradisional Aceh dari tepung ketan berisi serikaya, dibungkus daun pisang.',
                'gambar' => 'https://images.unsplash.com/photo-1599490659213-e2b9527bd087?w=800&q=80',
                'harga' => 5000,
                'jenis' => 'dessert',
            ],

            // ============ SUMATERA UTARA ============
            [
                'kabupaten' => 'Medan',
                'nama' => 'Bika Ambon',
                'deskripsi' => 'Kue tradisional Medan bertekstur kenyal dengan aroma pandan dan santan yang khas.',
                'gambar' => 'https://images.unsplash.com/photo-1558961363-fa8fdf82db35?w=800&q=80',
                'harga' => 40000,
                'jenis' => 'dessert',
            ],
            [
                'kabupaten' => 'Medan',
                'nama' => 'Lontong Medan',
                'deskripsi' => 'Lontong dengan sayur labu, tauco, sambal, dan berbagai lauk. Sarapan khas orang Medan.',
                'gambar' => 'https://images.unsplash.com/photo-1585032226651-759b368d7246?w=800&q=80',
                'harga' => 20000,
                'jenis' => 'makanan',
            ],
            [
                'kabupaten' => 'Samosir',
                'nama' => 'Mie Gomak',
                'deskripsi' => 'Mie khas Batak dengan kuah santan dan bumbu andaliman. Juga dikenal sebagai spaghetti Batak.',
                'gambar' => 'https://images.unsplash.com/photo-1569562211093-4ed0d0758f12?w=800&q=80',
                'harga' => 18000,
                'jenis' => 'makanan',
            ],

            // ============ SUMATERA BARAT ============
            [
                'kabupaten' => 'Padang',
                'nama' => 'Rendang',
                'deskripsi' => 'Makanan ikonik Minangkabau yang mendunia. Daging sapi dimasak lama dengan santan dan rempah.',
                'gambar' => 'https://images.unsplash.com/photo-1574484284002-952d92456975?w=800&q=80',
                'harga' => 35000,
                'jenis' => 'makanan',
            ],
            [
                'kabupaten' => 'Padang',
                'nama' => 'Sate Padang',
                'deskripsi' => 'Sate daging sapi dengan kuah kuning kental dari tepung beras dan rempah. Ciri khas Sumatera Barat.',
                'gambar' => 'https://images.unsplash.com/photo-1529193591184-b1d58069ecdd?w=800&q=80',
                'harga' => 25000,
                'jenis' => 'makanan',
            ],
            [
                'kabupaten' => 'Bukittinggi',
                'nama' => 'Keripik Sanjai',
                'deskripsi' => 'Keripik singkong khas Bukittinggi dengan bumbu balado pedas manis. Oleh-oleh wajib.',
                'gambar' => 'https://images.unsplash.com/photo-1599490659213-e2b9527bd087?w=800&q=80',
                'harga' => 15000,
                'jenis' => 'snack',
            ],
            [
                'kabupaten' => 'Padang',
                'nama' => 'Teh Talua',
                'deskripsi' => 'Teh dengan kuning telur ayam kampung dan gula, diaduk hingga berbusa. Minuman khas Minang.',
                'gambar' => 'https://images.unsplash.com/photo-1497534446932-c925b458314e?w=800&q=80',
                'harga' => 12000,
                'jenis' => 'minuman',
            ],

            // ============ RIAU ============
            [
                'kabupaten' => 'Pekanbaru',
                'nama' => 'Bolu Kemojo',
                'deskripsi' => 'Kue tradisional Melayu Riau berwarna hijau dengan aroma pandan. Bentuknya seperti bunga.',
                'gambar' => 'https://images.unsplash.com/photo-1558961363-fa8fdf82db35?w=800&q=80',
                'harga' => 30000,
                'jenis' => 'dessert',
            ],
            [
                'kabupaten' => 'Pekanbaru',
                'nama' => 'Gulai Ikan Patin',
                'deskripsi' => 'Gulai ikan patin dengan kuah kuning asam pedas. Kuliner khas Riau yang wajib dicoba.',
                'gambar' => 'https://images.unsplash.com/photo-1539755530862-00f623c00f52?w=800&q=80',
                'harga' => 30000,
                'jenis' => 'makanan',
            ],

            // ============ JAMBI ============
            [
                'kabupaten' => 'Jambi',
                'nama' => 'Tempoyak',
                'deskripsi' => 'Durian fermentasi yang diolah jadi sambal atau gulai. Fermentasi khas Jambi dan Sumatera.',
                'gambar' => 'https://images.unsplash.com/photo-1585032226651-759b368d7246?w=800&q=80',
                'harga' => 20000,
                'jenis' => 'makanan',
            ],
            [
                'kabupaten' => 'Kerinci',
                'nama' => 'Kopi Kerinci',
                'deskripsi' => 'Kopi arabika dari dataran tinggi Kerinci dengan aroma khas rempah dan rasa asam yang seimbang.',
                'gambar' => 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?w=800&q=80',
                'harga' => 25000,
                'jenis' => 'minuman',
            ],

            // ============ BANGKA BELITUNG ============
            [
                'kabupaten' => 'Pangkal Pinang',
                'nama' => 'Lempah Kuning',
                'deskripsi' => 'Sup ikan khas Bangka dengan kuah kuning dari kunyit dan nanas. Segar dan kaya rasa.',
                'gambar' => 'https://images.unsplash.com/photo-1547592180-85f173990554?w=800&q=80',
                'harga' => 30000,
                'jenis' => 'makanan',
            ],
            [
                'kabupaten' => 'Pangkal Pinang',
                'nama' => 'Kemplang Panggang',
                'deskripsi' => 'Kerupuk ikan tenggiri yang dipanggang, khas Bangka Belitung. Renyah dan gurih.',
                'gambar' => 'https://images.unsplash.com/photo-1599490659213-e2b9527bd087?w=800&q=80',
                'harga' => 20000,
                'jenis' => 'snack',
            ],

            // ============ BENGKULU ============
            [
                'kabupaten' => 'Bengkulu',
                'nama' => 'Pendap',
                'deskripsi' => 'Olahan ikan fermentasi dengan bumbu rempah, dibungkus daun talas. Kuliner khas Bengkulu.',
                'gambar' => 'https://images.unsplash.com/photo-1585032226651-759b368d7246?w=800&q=80',
                'harga' => 15000,
                'jenis' => 'makanan',
            ],

            // ============ LAMPUNG ============
            [
                'kabupaten' => 'Bandar Lampung',
                'nama' => 'Seruit',
                'deskripsi' => 'Makanan khas Lampung dari ikan bakar atau goreng dengan sambal terasi dan tempoyak.',
                'gambar' => 'https://images.unsplash.com/photo-1547592180-85f173990554?w=800&q=80',
                'harga' => 25000,
                'jenis' => 'makanan',
            ],
            [
                'kabupaten' => 'Bandar Lampung',
                'nama' => 'Kemplang Goreng',
                'deskripsi' => 'Kerupuk ikan khas Lampung yang digoreng, cocok untuk camilan atau pendamping makan.',
                'gambar' => 'https://images.unsplash.com/photo-1599490659213-e2b9527bd087?w=800&q=80',
                'harga' => 10000,
                'jenis' => 'snack',
            ],

            // ============ SUMATERA SELATAN ============
            [
                'kabupaten' => 'Palembang',
                'nama' => 'Pempek',
                'deskripsi' => 'Makanan ikonik Palembang berbahan dasar ikan dan tepung, disajikan dengan kuah cuko asam pedas manis.',
                'gambar' => 'https://images.unsplash.com/photo-1555126634-323283e090fa?w=800&q=80',
                'harga' => 15000,
                'jenis' => 'makanan',
            ],
            [
                'kabupaten' => 'Palembang',
                'nama' => 'Tekwan',
                'deskripsi' => 'Sup ikan khas Palembang dengan bola-bola ikan, soun, dan kuah kaldu udang yang gurih.',
                'gambar' => 'https://images.unsplash.com/photo-1569718212165-3a8278d5f624?w=800&q=80',
                'harga' => 12000,
                'jenis' => 'makanan',
            ],
            [
                'kabupaten' => 'Palembang',
                'nama' => 'Model Ikan',
                'deskripsi' => 'Mirip tekwan tapi dengan isian tahu dan kuah kuning yang lebih kental. Kuliner khas Palembang.',
                'gambar' => 'https://images.unsplash.com/photo-1547592180-85f173990554?w=800&q=80',
                'harga' => 13000,
                'jenis' => 'makanan',
            ],
            [
                'kabupaten' => 'Palembang',
                'nama' => 'Kemplang',
                'deskripsi' => 'Kerupuk ikan khas Palembang yang digoreng atau dibakar. Renyah dan gurih, cocok jadi oleh-oleh.',
                'gambar' => 'https://images.unsplash.com/photo-1599490659213-e2b9527bd087?w=800&q=80',
                'harga' => 8000,
                'jenis' => 'snack',
            ],
            [
                'kabupaten' => 'Palembang',
                'nama' => 'Es Kacang Merah',
                'deskripsi' => 'Minuman segar khas Palembang dengan kacang merah, kolang-kaling, dan sirop manis.',
                'gambar' => 'https://images.unsplash.com/photo-1497534446932-c925b458314e?w=800&q=80',
                'harga' => 10000,
                'jenis' => 'minuman',
            ],
            [
                'kabupaten' => 'Palembang',
                'nama' => 'Mie Celor',
                'deskripsi' => 'Mie dengan kuah santan dan udang khas Palembang. Biasanya disajikan dengan telur rebus.',
                'gambar' => 'https://images.unsplash.com/photo-1569562211093-4ed0d0758f12?w=800&q=80',
                'harga' => 15000,
                'jenis' => 'makanan',
            ],
            [
                'kabupaten' => 'Palembang',
                'nama' => 'Laksan',
                'deskripsi' => 'Olahan ikan dan tepung sagu yang disiram kuah santan. Makanan khas Palembang yang wajib dicoba.',
                'gambar' => 'https://images.unsplash.com/photo-1559847844-5315695dadae?w=800&q=80',
                'harga' => 13000,
                'jenis' => 'makanan',
            ],
            [
                'kabupaten' => 'Palembang',
                'nama' => 'Martabak HAR',
                'deskripsi' => 'Martabak telur khas Palembang yang disajikan dengan kuah kari. Perpaduan unik India-Melayu.',
                'gambar' => 'https://images.unsplash.com/photo-1619221882220-947b3d3c8861?w=800&q=80',
                'harga' => 20000,
                'jenis' => 'makanan',
            ],
            [
                'kabupaten' => 'Prabumulih',
                'nama' => 'Nanas Prabumulih',
                'deskripsi' => 'Nanas manis khas Prabumulih yang jadi ikon kota. Bisa dinikmati segar atau diolah jadi keripik.',
                'gambar' => 'https://images.unsplash.com/photo-1550258987-190a2d41a8ba?w=800&q=80',
                'harga' => 15000,
                'jenis' => 'makanan',
            ],
        ];

        foreach ($data as $item) {
            $kabupatenId = $kab($item['kabupaten']);
            if (!$kabupatenId) continue;

            Kuliner::updateOrCreate(
                ['nama' => $item['nama']],
                [
                    'kabupaten_id' => $kabupatenId,
                    'slug' => Str::slug($item['nama']),
                    'deskripsi' => $item['deskripsi'],
                    'gambar' => $item['gambar'],
                    'harga' => $item['harga'],
                    'jenis' => $item['jenis'],
                ]
            );
        }
    }
}
