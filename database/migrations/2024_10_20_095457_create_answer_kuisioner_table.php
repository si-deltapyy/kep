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
        Schema::create('answer_kuisioner', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('kuisioner_id');
            $table->string('kuisioner');
            $table->enum('kuisioner_status', ['upload', 'accept'])->default('upload');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user')->onDelete('CASCADE');
            $table->foreign('kuisioner_id')->references('id')->on('kuisioner')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answer_kuisioner');
    }
};
