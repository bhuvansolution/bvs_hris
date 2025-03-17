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
        Schema::create('pinjaman_kendaraans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id')
                ->constrained('karyawans')
                ->onDelete('cascade');
            $table->foreignId('kendaraan_id')
                ->constrained('kendaraans')
                ->onDelete('cascade');
            $table->integer('peminjaman_kendaraan_jumlah_barang');
            $table->date('peminjaman_kendaraan_waktu');
            $table->string('peminjaman_kendaraan_tanggal_pengembalian');
            $table->string('peminjaman_kendaraan_nama_kendaraan');
            $table->string('peminjaman_kendaraan_jenis_kendaraan');
            $table->string('peminjaman_kendaraan_keterangan');
            $table->enum('status', ['diterima', 'ditolak']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjaman_kendaraans');
    }
};
