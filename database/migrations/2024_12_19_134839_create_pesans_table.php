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
            $table->text('reviewer_id')->nullable();

            $table->unsignedBigInteger('dummy_id')->nullable();
            $table->unsignedBigInteger('document_id')->nullable();

            $table->foreign('dummy_id')->references('id')->on('dummy')->onDelete('cascade');
            $table->foreign('document_id')->references('id')->on('document')->onDelete('cascade');
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
