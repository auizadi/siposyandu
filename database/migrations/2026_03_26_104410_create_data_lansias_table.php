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
        Schema::create('data_lansias', function (Blueprint $table) {
            $table->id();
            $table->string('nik_lansia')->unique();
            $table->string('nama_lansia');
            $table->enum('jenis_kelamin',['Laki-laki','Perempuan']);
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->text('riwayat_kesehatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_lansias');
    }
};
