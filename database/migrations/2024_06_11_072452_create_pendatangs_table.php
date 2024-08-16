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
        Schema::create('pendatangs', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16);
            $table->string('no_kk', 16);
            $table->string('nama');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('agama');
            $table->enum('status_pernikahan', ['kawin', 'belum_kawin']);
            $table->string('pendidikan')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('rt');
            $table->string('rw');
            $table->string('dusun');
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->date('tanggal_datang');
            $table->string('nama_pelapor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendatangs');
    }
};
