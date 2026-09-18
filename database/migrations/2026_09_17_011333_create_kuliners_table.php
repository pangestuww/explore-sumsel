<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kuliners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kabupaten_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('nama');
            $table->string('slug')->unique();
            $table->text('deskripsi');
            $table->string('gambar');
            $table->integer('harga')->default(0);
            $table->enum('jenis', ['makanan', 'minuman', 'snack', 'dessert'])->default('makanan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kuliners');
    }
};
