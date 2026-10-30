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
        Schema::table('feedback', function (Blueprint $table) {
            // Menambahkan kolom user_id setelah kolom id
            // Dibuat nullable agar aman untuk data lama yang mungkin sudah ada
            $table->foreignId('user_id')->nullable()->after('id')->constrained('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('feedback', function (Blueprint $table) {
            // Menghapus foreign key dan kolom user_id jika di-rollback
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};