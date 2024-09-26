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
        Schema::create('dummy', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('doc_group');
            $table->unsignedBigInteger('user_id');
            $table->enum('doc_status', ['new-proposal', 'on-review', 'approved','approved-with','resubmission', 'disapproved', 'revised'])->default('new-proposal');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dummy');
    }
};
