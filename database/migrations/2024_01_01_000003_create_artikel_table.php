<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('artikel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_penulis')->constrained('penulis')->onDelete('cascade');
            $table->foreignId('id_kategori')->constrained('kategori_artikel')->onDelete('cascade');
            $table->string('judul');
            $table->string('gambar')->nullable();
            $table->text('isi');
            $table->string('hari_tanggal');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('artikel');
    }
};
