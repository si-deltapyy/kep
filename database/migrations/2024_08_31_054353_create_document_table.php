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
        Schema::create('document', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('doc_name');
            $table->string('doc_path');
            $table->unsignedBigInteger('doc_type');
            $table->unsignedBigInteger('doc_group');
            $table->unsignedBigInteger('ajuan_type');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user')->onDelete('CASCADE');
            $table->foreign('doc_type')->references('id')->on('document_type')->onDelete('CASCADE');
            $table->foreign('ajuan_type')->references('id')->on('ajuan_type')->onDelete('CASCADE');
            $table->foreign('doc_group')->references('id')->on('dummy')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document');
    }
};
