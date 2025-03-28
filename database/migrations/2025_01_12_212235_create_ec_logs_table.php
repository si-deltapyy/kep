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
        Schema::create('ec_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ec_id')->constrained('ec_document')->onDelete('cascade');
            $table->string('old_status')->nullable();
            $table->string('new_status');
            $table->timestamp('changed_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ec_logs');
    }
};
