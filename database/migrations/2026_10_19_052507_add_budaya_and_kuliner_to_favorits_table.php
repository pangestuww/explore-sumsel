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
        Schema::table('favorits', function (Blueprint $table) {
            // 🌟 Cek dulu, kalau belum ada baru tambahin
            if (!Schema::hasColumn('favorits', 'budaya_id')) {
                $table->foreignId('budaya_id')->nullable()->after('destinasi_id')->constrained('budayas')->onDelete('cascade');
            }
            if (!Schema::hasColumn('favorits', 'kuliner_id')) {
                $table->foreignId('kuliner_id')->nullable()->after('budaya_id')->constrained('kuliners')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('favorits', function (Blueprint $table) {
            //
        });
    }
};
