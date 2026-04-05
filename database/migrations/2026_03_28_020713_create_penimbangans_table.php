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
        Schema::create('penimbangans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('balita_id')->constrained('data_balita_models')->cascadeOnDelete();
            $table->date('tanggal_penimbangan');
            $table->float('berat_badan');
            $table->float('tinggi_badan');
            $table->enum('status_gizi',['Gizi Baik','Gizi Lebih','Gizi Kurang']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penimbangans');
    }
};
