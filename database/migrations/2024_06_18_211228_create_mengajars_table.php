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
        Schema::create('mengajars', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('lowongan_id');
            $table->unsignedBigInteger('lamaran_id');
            $table->string('nik_tutor')->length(16);
            $table->string('nik_parent')->length(16);
            $table->enum('status',['Mengajar','Berhenti'])->default('Mengajar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mengajars');
    }
};
