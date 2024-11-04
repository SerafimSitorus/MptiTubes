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
        Schema::create('parents', function (Blueprint $table) {
            $table->string('nik')->length(16)->primary();
            $table->uuid('user_id');
            $table->string('nama_parents')->length(150);
            $table->enum('jenis_kelamin',['L','P']);
            $table->string('tempat_lahir')->length(100)->nullable();
            $table->date('tanggal_lahir');
            $table->string('no_hp')->length(14);
            $table->string('provinsi');
            $table->string('alamat_domisili')->length(250)->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parents');
    }
};
