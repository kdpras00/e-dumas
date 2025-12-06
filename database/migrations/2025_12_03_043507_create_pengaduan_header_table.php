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
        Schema::create('pengaduan_header', function (Blueprint $table) {
            $table->id();
            $table->string('subject', 45);
            $table->foreignId('kategori_id')->constrained('kategori');
            $table->integer('no_pengaduan')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduan_header');
    }
};
