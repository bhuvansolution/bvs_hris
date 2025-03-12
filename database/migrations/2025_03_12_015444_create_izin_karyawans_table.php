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
        Schema::create('izin_karyawans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id')
                ->constrained('karyawans')
                ->onDelete('cascade');
            $table->foreignId('jenisizin_id')
                ->constrained('jenis_izins')
                ->onDelete('cascade');
            $table->string('izin_alasan');
            $table->string('izin_waktu');
            $table->string('izin_bukti');
            $table->string('izin_keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('izin_karyawans');
    }
};
