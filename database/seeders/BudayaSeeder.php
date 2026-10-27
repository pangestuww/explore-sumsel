<?php

namespace Database\Seeders;

use App\Models\Budaya;
use App\Models\Kabupaten;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class BudayaSeeder extends Seeder
{
    public function run(): void
    {
        $jsonPath = database_path('seeders/data/budaya.json');

        if (!File::exists($jsonPath)) {
            $this->command->error("File JSON TIDAK DITEMUKAN di: {$jsonPath}");
            return;
        }

        $data = json_decode(File::get($jsonPath), true);

        Schema::disableForeignKeyConstraints();
        Budaya::query()->delete();
        Schema::enableForeignKeyConstraints();

        $berhasil = 0;
        $kabupatenCadangan = Kabupaten::first();

        foreach ($data as $item) {
            // Cari kabupaten, kalau nggak ketemu pakai cadangan
            $kabupaten = Kabupaten::where('nama', 'like', '%' . $item['kab'] . '%')->first();
            if (!$kabupaten) {
                $kabupaten = $kabupatenCadangan;
            }

            Budaya::create([
                'kabupaten_id' => $kabupaten->id,
                'nama' => $item['nama'],
                'slug' => Str::slug($item['nama']),
                'jenis' => $item['jenis'],
                'deskripsi' => $item['desk'],
                'gambar' => $item['img'],
            ]);

            $berhasil++;
        }

        $this->command->info("✅ Berhasil memasukkan {$berhasil} data BUDAYA!");
    }
}
