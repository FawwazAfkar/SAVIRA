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
        //create arsip vital table
        Schema::create('arsip_vitals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('instansi_id')->constrained()->onDelete('restrict');
            $table->string('jenis_arsip')->nullable(false);
            $table->string('tingkat_perkembangan')->nullable(false);
            $table->string('kurun_waktu')->nullable(false);
            $table->string('media')->nullable(false);
            $table->string('jumlah')->nullable(false);
            $table->string('jangka_simpan')->nullable(false);
            $table->string('metode_perlindungan')->nullable(false);
            $table->string('lokasi_simpan')->nullable(false);
            $table->string('file')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //drop table arsip vital if exist
        Schema::dropIfExists('arsipvitals');
    }
};
