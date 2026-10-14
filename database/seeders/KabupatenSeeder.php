<?php

namespace Database\Seeders;

use App\Models\Kabupaten;
use App\Models\Provinsi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KabupatenSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // ============ ACEH (23) ============
            'Aceh' => [
                'Banda Aceh', 'Sabang', 'Lhokseumawe', 'Langsa', 'Subulussalam',
                'Aceh Besar', 'Pidie', 'Pidie Jaya', 'Bireuen', 'Aceh Utara',
                'Aceh Timur', 'Aceh Tamiang', 'Aceh Barat', 'Aceh Barat Daya',
                'Aceh Jaya', 'Nagan Raya', 'Aceh Selatan', 'Aceh Singkil',
                'Simeulue', 'Gayo Lues', 'Bener Meriah', 'Aceh Tengah', 'Aceh Tenggara',
            ],
            // ============ SUMATERA UTARA (33) ============
            'Sumatera Utara' => [
                'Medan', 'Binjai', 'Tebing Tinggi', 'Pematang Siantar', 'Tanjung Balai',
                'Sibolga', 'Padang Sidempuan', 'Gunungsitoli',
                'Deli Serdang', 'Langkat', 'Karo', 'Simalungun', 'Asahan',
                'Labuhanbatu', 'Labuhanbatu Utara', 'Labuhanbatu Selatan',
                'Tapanuli Utara', 'Tapanuli Tengah', 'Tapanuli Selatan',
                'Toba Samosir', 'Samosir', 'Humbang Hasundutan', 'Pakpak Bharat',
                'Dairi', 'Batubara', 'Padang Lawas', 'Padang Lawas Utara',
                'Mandailing Natal', 'Nias', 'Nias Selatan', 'Nias Utara', 'Nias Barat',
            ],
            // ============ SUMATERA BARAT (19) ============
            'Sumatera Barat' => [
                'Padang', 'Bukittinggi', 'Padang Panjang', 'Payakumbuh', 'Solok',
                'Sawahlunto', 'Pariaman',
                'Agam', 'Tanah Datar', 'Lima Puluh Kota', 'Pesisir Selatan',
                'Solok Selatan', 'Sijunjung', 'Dharmasraya', 'Pasaman',
                'Pasaman Barat', 'Padang Pariaman', 'Kepulauan Mentawai',
            ],
            // ============ RIAU (12) ============
            'Riau' => [
                'Pekanbaru', 'Dumai',
                'Kampar', 'Rokan Hulu', 'Rokan Hilir', 'Siak', 'Bengkalis',
                'Indragiri Hulu', 'Indragiri Hilir', 'Pelalawan', 'Kuantan Singingi',
                'Kepulauan Meranti',
            ],
            // ============ KEPULAUAN RIAU (7) ============
            'Kepulauan Riau' => [
                'Batam', 'Tanjung Pinang',
                'Bintan', 'Karimun', 'Natuna', 'Lingga', 'Kepulauan Anambas',
            ],
            // ============ JAMBI (11) ============
            'Jambi' => [
                'Jambi', 'Sungai Penuh',
                'Muaro Jambi', 'Batanghari', 'Tebo', 'Bungo', 'Merangin',
                'Sarolangun', 'Kerinci', 'Tanjung Jabung Barat', 'Tanjung Jabung Timur',
            ],
            // ============ SUMATERA SELATAN (17) ============
            'Sumatera Selatan' => [
                'Palembang', 'Prabumulih', 'Pagar Alam', 'Lubuklinggau',
                'Banyuasin', 'Musi Banyuasin', 'Musi Rawas', 'Musi Rawas Utara',
                'Lahat', 'Muara Enim', 'Penukal Abab Lematang Ilir',
                'Ogan Komering Ulu', 'Ogan Komering Ilir', 'Ogan Ilir',
                'Ogan Komering Ulu Timur', 'Ogan Komering Ulu Selatan',
                'Empat Lawang',
            ],
            // ============ BANGKA BELITUNG (7) ============
            'Kepulauan Bangka Belitung' => [
                'Pangkal Pinang',
                'Bangka', 'Bangka Barat', 'Bangka Tengah', 'Bangka Selatan',
                'Belitung', 'Belitung Timur',
            ],
            // ============ BENGKULU (10) ============
            'Bengkulu' => [
                'Bengkulu',
                'Bengkulu Selatan', 'Bengkulu Tengah', 'Bengkulu Utara',
                'Kaur', 'Seluma', 'Mukomuko', 'Lebong', 'Rejang Lebong', 'Kepahiang',
            ],
            // ============ LAMPUNG (15) ============
            'Lampung' => [
                'Bandar Lampung', 'Metro',
                'Lampung Selatan', 'Lampung Tengah', 'Lampung Utara',
                'Lampung Barat', 'Lampung Timur', 'Way Kanan', 'Tulang Bawang',
                'Tulang Bawang Barat', 'Pesawaran', 'Pringsewu', 'Tanggamus',
                'Pesisir Barat', 'Mesuji',
            ],
        ];

        foreach ($data as $provinsiNama => $kabupatens) {
            $provinsi = Provinsi::where('nama', $provinsiNama)->first();
            if (!$provinsi) {
                $this->command->warn("⚠ Provinsi tidak ditemukan: {$provinsiNama}");
                continue;
            }

            foreach ($kabupatens as $nama) {
                Kabupaten::updateOrCreate(
                    ['nama' => $nama],
                    [
                        'provinsi_id' => $provinsi->id,
                        'slug' => Str::slug($nama),
                        'latitude' => null,
                        'longitude' => null,
                    ]
                );
            }
        }

        $this->command->info('✓ Total kabupaten: ' . Kabupaten::count());
    }
}