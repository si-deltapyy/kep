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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();

            $table->string('sender_role');
            $table->string('receiver_role');
            $table->text('message');
            $table->boolean('is_read')->default(false);
            $table->text('reviewer_id')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('sender_id');
            $table->unsignedBigInteger('receiver_id');
            $table->unsignedBigInteger('dummy_id')->nullable();
            $table->unsignedBigInteger('document_id')->nullable();

            $table->foreign('sender_id')->references('id')->on('user')->onDelete('cascade');
            $table->foreign('receiver_id')->references('id')->on('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
