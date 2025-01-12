<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul aktivitas
            $table->text('description')->nullable(); // Deskripsi aktivitas (nullable jika tidak wajib)
            $table->enum('action_label', ['Upload Success', 'Reupload', 'Ajuan Ditolak', 'Proses Review', 'Dokumen Valid', 'Penerbitan EC', 'Ajuan Selesai', 'Pengecakan Dokumen', 'Payment Pending', 'Payment Success'])->default('Upload Success'); // Label untuk aksi
            $table->string('action_link')->nullable(); // Link untuk aksi
            $table->timestamp('time')->useCurrent(); // Waktu aktivitas
            $table->unsignedBigInteger('doc_group'); // ID grup dokumen
            $table->timestamps(); // created_at dan updated_at

            $table->foreign('doc_group')->references('id')->on('dummy')->onDelete('cascade'); // Relasi ke tabel dummy
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
};

