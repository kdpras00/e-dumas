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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username', 45)->unique();
            $table->string('email', 45)->unique();
            $table->string('password', 255)->nullable();
            $table->string('alamat', 500);
            $table->string('no_hp', 25)->unique();
            $table->string('nik', 25)->unique();
            $table->string('nama_lengkap', 45);
            $table->foreignId('rt_id')->constrained('rt');
            $table->foreignId('user_level_id')->constrained('user_level');
            $table->foreignId('kategori_id')->nullable()->constrained('kategori');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
