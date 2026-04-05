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
        Schema::create('jadwal_posyandus', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->enum('jenis', ['balita', 'lansia']);
            $table->unique(['jenis', 'tanggal']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_posyandus');
    }
};
