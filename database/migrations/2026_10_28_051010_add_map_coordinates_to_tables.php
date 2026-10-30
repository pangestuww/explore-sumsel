<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Tambah kolom di tabel budayas
        Schema::table('budayas', function (Blueprint $table) {
            if (!Schema::hasColumn('budayas', 'link_maps')) {
                $table->text('link_maps')->nullable()->after('deskripsi');
            }
            if (!Schema::hasColumn('budayas', 'latitude')) {
                $table->string('latitude')->nullable();
            }
            if (!Schema::hasColumn('budayas', 'longitude')) {
                $table->string('longitude')->nullable();
            }
        });

        // 2. Tambah kolom di tabel destinasis (jika nanti dibutuhkan)
        Schema::table('destinasis', function (Blueprint $table) {
            if (!Schema::hasColumn('destinasis', 'link_maps')) {
                $table->text('link_maps')->nullable()->after('deskripsi');
            }
            if (!Schema::hasColumn('destinasis', 'latitude')) {
                $table->string('latitude')->nullable();
            }
            if (!Schema::hasColumn('destinasis', 'longitude')) {
                $table->string('longitude')->nullable();
            }
        });

        // 3. Tambah kolom di tabel kuliners (jika nanti dibutuhkan)
        Schema::table('kuliners', function (Blueprint $table) {
            if (!Schema::hasColumn('kuliners', 'link_maps')) {
                $table->text('link_maps')->nullable()->after('deskripsi');
            }
            if (!Schema::hasColumn('kuliners', 'latitude')) {
                $table->string('latitude')->nullable();
            }
            if (!Schema::hasColumn('kuliners', 'longitude')) {
                $table->string('longitude')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('budayas', function (Blueprint $table) {
            $table->dropColumn(['link_maps', 'latitude', 'longitude']);
        });
        Schema::table('destinasis', function (Blueprint $table) {
            $table->dropColumn(['link_maps', 'latitude', 'longitude']);
        });
        Schema::table('kuliners', function (Blueprint $table) {
            $table->dropColumn(['link_maps', 'latitude', 'longitude']);
        });
    }
};
