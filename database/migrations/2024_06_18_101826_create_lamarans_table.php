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
        Schema::create('lamarans', function (Blueprint $table) {
            $table->uuid('id_lamaran');
            $table->string('nik_tutor')->length(16);   
            $table->string('nik_parent')->length(16);
            $table->uuid('lowongan_id');
            $table->enum('status',['Disetujui','Ditolak', 'Menunggu Persetujuan']);
            $table->foreign('lowongan_id')->references('id')->on('tutor_criterias')->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lamarans');
    }
};
