<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // 🌟 Cek dulu, kalau kolom 'jenis' belum ada, baru tambahin
        if (!Schema::hasColumn('kuliners', 'jenis')) {
            Schema::table('kuliners', function (Blueprint $table) {
                $table->string('jenis')->nullable()->after('nama');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kuliners', function (Blueprint $table) {
            //
        });
    }
};
