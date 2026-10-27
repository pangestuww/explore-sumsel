<?php

namespace Database\Seeders;

use App\Models\Destinasi;
use App\Models\Kabupaten;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class DestinasiSeeder extends Seeder
{
    public function run(): void
    {
        $jsonPath = database_path('seeders/data/destinasi.json');

        if (!File::exists($jsonPath)) {
            $this->command->error("File JSON TIDAK DITEMUKAN di: {$jsonPath}");
            return;
        }

        $data = json_decode(File::get($jsonPath), true);

        Schema::disableForeignKeyConstraints();
        Destinasi::query()->delete();
        Schema::enableForeignKeyConstraints();

        $berhasil = 0;
        $kabupatenCadangan = Kabupaten::first();

        foreach ($data as $item) {
            // ==========================================
            // 🌟 FILTER DISINI: HANYA MASUKKAN YANG ALAM
            // ==========================================
            if ($item['kategori'] !== 'alam') {
                continue; // Lewati jika buday/kuliner
            }

            $kabupaten = Kabupaten::where('nama', 'like', '%' . $item['kab'] . '%')->first();

            if (!$kabupaten) {
                $kabupaten = $kabupatenCadangan;
            }

            Destinasi::create([
                'kabupaten_id' => $kabupaten->id,
                'nama' => $item['nama'],
                'slug' => Str::slug($item['nama']),
                'kategori' => $item['kategori'], // Ini akan selalu 'alam'
                'jenis' => $item['jenis'],
                'harga_tiket' => $item['harga'],
                'rating' => $item['rating'],
                'deskripsi' => $item['desk'],
                'gambar' => $item['img'],
                'latitude' => $item['lat'],
                'longitude' => $item['lng'],
            ]);

            $berhasil++;
        }

        $this->command->info("✅ Berhasil memasukkan {$berhasil} data DESTINASI ALAM (Budaya & Kuliner di-skip)!");
    }
}
