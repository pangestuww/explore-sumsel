<?php

namespace Database\Seeders;

use App\Models\Kuliner;
use App\Models\Kabupaten;
use App\Models\Provinsi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class KulinerSeeder extends Seeder
{
    public function run(): void
    {
        $jsonPath = database_path('seeders/data/kuliner.json');

        if (!File::exists($jsonPath)) {
            $this->command->error("File JSON TIDAK DITEMUKAN!");
            return;
        }

        $data = json_decode(File::get($jsonPath), true);

        Schema::disableForeignKeyConstraints();
        Kuliner::query()->delete();
        Schema::enableForeignKeyConstraints();

        $berhasil = 0;
        $kabupatenCadangan = Kabupaten::first();

        foreach ($data as $prov) {
            $provinsi = Provinsi::where('nama', 'like', '%' . $prov['provinsi'] . '%')->first();

            if ($provinsi) {
                $kabupaten = Kabupaten::where('provinsi_id', $provinsi->id)->first();
            } else {
                $kabupaten = $kabupatenCadangan;
            }

            foreach ($prov['kuliner_populer'] as $namaMakanan) {
                // Panggil fungsi deteksi yang sudah diperbaiki
                $jenis = $this->tentukanKategori($namaMakanan);

                Kuliner::create([
                    'kabupaten_id' => $kabupaten->id,
                    'nama' => $namaMakanan,
                    'jenis' => $jenis,
                    'slug' => Str::slug($namaMakanan),
                    'deskripsi' => "Kuliner khas dari Provinsi " . $prov['provinsi'] . ".",
                    'gambar' => 'https://images.unsplash.com/photo-1555126634-323283e090fa?w=800&q=80',
                ]);

                $berhasil++;
            }
        }

        $this->command->info("✅ Berhasil memasukkan {$berhasil} data KULINER dengan kategori yang lebih akurat!");
    }

    // ========================================================
    // FUNGSI DETEKSI KATEGORI YANG LEBIH CERDAS & KETAT
    // ========================================================
    private function tentukanKategori($nama)
    {
        $nama = strtolower($nama);

        // 1. DETEKSI MINUMAN
        $kataMinuman = ['kopi', 'teh', 'es ', 'jus', 'sirup', 'susu', 'cendol', 'dawet', 'air'];
        foreach ($kataMinuman as $kata) {
            if (str_contains($nama, $kata)) return 'minuman';
        }

        // 2. DETEKSI DESSERT (KUE, MANIS-MANIS)
        $kataDessert = ['kue', 'dodol', 'wajik', 'lapis', 'bika', 'puding', 'lupis', 'timphan', 'meuseukat', 'serabi', 'kolak', 'galamai', 'lempuk', 'bubur', 'pukis', 'cucur', 'pancong'];
        foreach ($kataDessert as $kata) {
            if (str_contains($nama, $kata)) return 'dessert';
        }

        // 3. DETEKSI SNACK (CAMILAN RINGAN)
        $kataSnack = ['kerupuk', 'kemplang', 'otak-otak', 'martabak', 'tahu', 'tempe', 'singkong', 'ubi', 'jagung', 'kacang', 'pisang goreng', 'bakwan', 'cireng', 'laksan', 'celimpungan', 'tekwan'];
        foreach ($kataSnack as $kata) {
            if (str_contains($nama, $kata)) return 'snack';
        }

        // 4. SISANYA ADALAH MAKANAN UTAMA (Mie, Nasi, Ikan, Ayam, Sate, Gulai, Bakar, dll)
        // "Ikan Bakar", "Bihun Goreng" akan otomatis masuk ke sini.
        return 'makanan';
    }
}
