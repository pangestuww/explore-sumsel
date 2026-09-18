<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('budayas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kabupaten_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('nama');
            $table->string('slug')->unique();   // ← PASTIKAN ADA BARIS INI
            $table->text('deskripsi');
            $table->string('gambar');
            $table->enum('jenis', ['rumah_adat', 'tari', 'senjata', 'pakaian', 'upacara', 'alat_musik'])->default('tari');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('budayas');
    }
};
