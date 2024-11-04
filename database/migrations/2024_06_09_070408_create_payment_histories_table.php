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
        Schema::create('payment_histories', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengirim')->length(150);
            $table->string('tutor')->length(150);
            $table->string('provinsi');
            $table->enum('status',['Paid','Unpaid']);
            $table->string('proof')->length(250);
            $table->timestamps();
            $table->foreign('nama_pengirim')->references('nik')->on('parents')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('tutor')->references('nik')->on('tutors')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_histories');
    }
};
