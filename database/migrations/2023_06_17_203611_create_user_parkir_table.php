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
        Schema::create('user_parkir', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('parkir_id');
            $table->string('kode_parkir');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('parkir_id')->references('id')->on('parkir');
        });

        // Update jumlah kendaran in table parkir when user parkir
        DB::unprepared('
            CREATE TRIGGER `user_parkir_after_insert` AFTER INSERT ON `user_parkir` FOR EACH ROW
            BEGIN
                UPDATE parkir SET kendaraan_parkir = kendaraan_parkir + 1 WHERE id = NEW.parkir_id;
            END
        ');

        // Update jumlah kendaran in table parkir when user unparkir
        DB::unprepared('
            CREATE TRIGGER `user_parkir_after_delete` AFTER DELETE ON `user_parkir` FOR EACH ROW
            BEGIN
                UPDATE parkir SET kendaraan_parkir = kendaraan_parkir - 1 WHERE id = OLD.parkir_id;
            END
        ');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_parkir');

        // Drop trigger
        DB::unprepared('DROP TRIGGER IF EXISTS `user_parkir_after_insert`');
        DB::unprepared('DROP TRIGGER IF EXISTS `user_parkir_after_delete`');
    }
};
