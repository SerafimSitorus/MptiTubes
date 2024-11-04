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
        Schema::create('lowongans', function (Blueprint $table) {
            $table->increments('id_lowongan');
            $table->string('nik_tutor')->length(16);
            $table->string('nik_parent')->length(16);

            $table->timestamps();

            $table->foreign('nik_tutor')->references('nik')->on('tutors')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('nik_parent')->references('nik')->on('parents')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lowongans');
    }
};
