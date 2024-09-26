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
        Schema::create('profile_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->char('name', length: 100);
            $table->char('phone_number', length: 15)->default('00');
            $table->enum('gender', ['laki-laki', 'perempuan'])->default('laki-laki');
            $table->enum('status', ['Dosen', 'Mahasiswa'])->default('Mahasiswa');
            $table->unsignedBigInteger('prodi_id')->default('1');
            $table->char('nik', length: 16)->default('000');
            $table->text('address')->default('none');
            $table->timestamps();

            $table->foreign('prodi_id')->references('id')->on('prodi')->onDelete('CASCADE');
            $table->foreign('user_id')->references('id')->on('user')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_user');
    }
};
