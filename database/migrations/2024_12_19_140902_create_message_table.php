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
        Schema::create('message', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender_id');
            $table->unsignedBigInteger('receiver_id');
            $table->unsignedBigInteger('submissions_id');
            $table->unsignedBigInteger('doc_group');
            $table->text('note');
            $table->boolean('is_read')->default(false);
            $table->timestamps();

            $table->foreign('sender_id')->references('id')->on('user')->onDelete('CASCADE');
            $table->foreign('receiver_id')->references('id')->on('user')->onDelete('CASCADE');
            $table->foreign('submissions_id')->references('id')->on('submission')->onDelete('CASCADE');
            $table->foreign('doc_group')->references('id')->on('dummy')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message');
    }
};
