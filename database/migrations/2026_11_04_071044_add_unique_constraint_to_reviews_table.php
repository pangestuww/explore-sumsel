<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            // Mencegah user memberikan ulasan ganda pada destinasi yang sama
            $table->unique(['user_id', 'destinasi_id']);
            
            // Mencegah user memberikan ulasan ganda pada budaya yang sama
            $table->unique(['user_id', 'budaya_id']);
            
            // Mencegah user memberikan ulasan ganda pada kuliner yang sama
            $table->unique(['user_id', 'kuliner_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            // Menghapus aturan unik jika migrasi di-rollback
            $table->dropUnique(['user_id', 'destinasi_id']);
            $table->dropUnique(['user_id', 'budaya_id']);
            $table->dropUnique(['user_id', 'kuliner_id']);
        });
    }
};