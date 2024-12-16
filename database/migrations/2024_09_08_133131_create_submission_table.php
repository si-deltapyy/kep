<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('submission', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('log_id');
            $table->string('reviewer');
            $table->unsignedBigInteger('doc_group');
            $table->enum('reviewer_status', ['done', 'process'])->default('process')->nullable();
            $table->timestamps();

            $table->foreign('log_id')->references('id')->on('log_document')->onDelete('CASCADE');
            $table->foreign('doc_group')->references('id')->on('dummy')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submission');
    }
};
