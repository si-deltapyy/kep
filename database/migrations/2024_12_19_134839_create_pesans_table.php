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
        Schema::create('pesans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('review')->nullable();

            $table->unsignedBigInteger('dummy_id')->nullable();
            $table->unsignedBigInteger('submission_id')->nullable();

            $table->foreign('dummy_id')->references('id')->on('dummy')->onDelete('cascade');
            $table->foreign('submission_id')->references('id')->on('submission')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesans');
    }
};
