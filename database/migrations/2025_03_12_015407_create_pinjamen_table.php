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
        Schema::disableForeignKeyConstraints();
        Schema::create('pinjamen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id')
                ->constrained('karyawans')
                ->onDelete('cascade');
            $table->date('pinjaman_tanggal_pengajuan');
            $table->integer('pinjaman_jumlah');
            $table->string('pinjaman_jenis');
            $table->string('pinjaman_persetujuan');
            $table->date('pinjaman_lama_cicilan');
            $table->date('pinjaman_cicilan_bulanan');
            $table->string('pinjaman_keterangan');
            $table->enum('status', ['diterima', 'ditolak']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjamen');
    }
};
