<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Cek dulu, kalau kolom 'jenis' belum ada, baru buat
        if (!Schema::hasColumn('kuliners', 'jenis')) {
            Schema::table('kuliners', function (Blueprint $table) {
                $table->string('jenis')->nullable(); // Sesuaikan tipe datanya
            });
        }
    }

    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            // Balikin ke semula (gak boleh kosong)
            $table->foreignId('destinasi_id')->nullable(false)->change();
            $table->foreignId('budaya_id')->nullable(false)->change();
            $table->foreignId('kuliner_id')->nullable(false)->change();
        });
    }
};
