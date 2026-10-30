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
        Schema::table('budayas', function (Blueprint $table) {
            // Menambahkan kolom link_maps setelah kolom 'nama' (atau sesuaikan)
            $table->string('link_maps')->nullable()->after('nama');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('budayas', function (Blueprint $table) {
            // Menghapus kolom jika migration di-rollback
            $table->dropColumn('link_maps');
        });
    }
};
