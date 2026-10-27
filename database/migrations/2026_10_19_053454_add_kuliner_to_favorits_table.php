<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('favorits', function (Blueprint $table) {
            $table->foreignId('budaya_id')->nullable()->after('destinasi_id');
            $table->foreignId('kuliner_id')->nullable()->after('budaya_id');
        });
    }

    public function down(): void
    {
        Schema::table('favorits', function (Blueprint $table) {
            $table->dropColumn(['budaya_id', 'kuliner_id']);
        });
    }
};
