<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('budayas', function (Blueprint $table) {
            $table->string('link_maps')->nullable()->after('longitude');
        });
        Schema::table('kuliners', function (Blueprint $table) {
            $table->string('link_maps')->nullable()->after('longitude');
        });
    }

    public function down(): void
    {
        Schema::table('budayas', function (Blueprint $table) {
            $table->dropColumn('link_maps');
        });
        Schema::table('kuliners', function (Blueprint $table) {
            $table->dropColumn('link_maps');
        });
    }
};
