<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('parkir', function (Blueprint $table) {
            $table->id();
            $table->string('kode_parkir');
            $table->string('nama_parkir');
            $table->integer('kuota_parkir');
            $table->integer('kendaraan_parkir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parkir');
        
        // Drop trigger
        DB::unprepared('DROP TRIGGER IF EXISTS `parkir_after_update`');

    }
};
