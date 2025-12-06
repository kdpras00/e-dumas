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
        Schema::create('pengaduan_detail', function (Blueprint $table) {
            $table->id();
            $table->text('detail_masalah');
            $table->foreignId('pengaduan_header_id')->constrained('pengaduan_header');
            $table->foreignId('users_id')->constrained('users');
            $table->foreignId('status_id')->default(1)->constrained('status');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduan_detail');
    }
};
