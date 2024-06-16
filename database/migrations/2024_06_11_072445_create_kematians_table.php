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
        Schema::create('kematians', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16);
            $table->string('nama');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->date('tanggal_kematian');
            $table->time('jam_kematian');
            $table->string('tempat_kematian');
            $table->string('sebab');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kematians');
    }
};
