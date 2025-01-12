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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('sekertaris_id')->nullable();
            $table->enum('doc_status', ['new-proposal','process', 'on-review', 'approved','approved-with','resubmission', 'disapproved', 'revised', 'done'])->default('new-proposal');
            $table->enum('doc_flag', ['Waiting','Progress','In Review','Feedback Review','Done','EC Process'])->default('Waiting');
            $table->boolean('review_status')->default(0);
            $table->timestamp('ec_proceed_at')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user')->onDelete('CASCADE');
            $table->foreign('sekertaris_id')->references('id')->on('user')->onDelete('CASCADE');
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
