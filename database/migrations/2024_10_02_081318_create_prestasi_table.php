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
        Schema::create('prestasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('juara_id')->constrained('juara')->onDelete('cascade');
            $table->foreignId('bidang_lomba_id')->constrained('bidang_lomba')->onDelete('cascade');
            $table->string('nama_lomba');
            $table->year('tahun');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasi');
    }
};
