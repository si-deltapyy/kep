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
        Schema::create('ec_document', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('doc_name')->nullable();
            $table->string('doc_path')->nullable();
            $table->unsignedBigInteger('doc_group');
            $table->enum('ec_status', ['Waiting Sign KPPM', 'Signed', 'Process', 'Distribute'])->default('Waiting Sign KPPM');
            $table->string('ethical_number')->nullable();
            $table->timestamp('signed_at')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user')->onDelete('CASCADE');
            $table->foreign('doc_group')->references('id')->on('dummy')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ec_document');
    }
};
