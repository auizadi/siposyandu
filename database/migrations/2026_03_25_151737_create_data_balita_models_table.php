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
        Schema::create('data_balita_models', function (Blueprint $table) {
            $table->id();
            $table->string('nik_anak')->unique();
            $table->string('nama_anak');
            $table->enum('jenis_kelamin', ['Laki-laki','Perempuan']);
            $table->date('tanggal_lahir');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->text('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_balita_models');
    }
};
