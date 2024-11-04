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
        Schema::create('tutor_criterias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik')->length(16);
            $table->enum('jenis_kelamin',['L','P','Both']);
            $table->string('provinsi');
            $table->string('alamat_mengajar')->length(250);
            $table->string('universitas_sekolah')->length(250);
            $table->enum('student_level',['S3','S2', 'S1','SMA','SMK','SMP','SD','TK']);
            $table->string('jurusan')->length(100);
            $table->string('mata_pelajaran');
            $table->string('hari')->length(250);
            $table->enum('status',['Disetujui','Ditolak', 'Menunggu Persetujuan']);
            $table->enum('status_accept',['Sudah Dilamar','Belum Dilamar'])->default('Belum Dilamar');
            $table->string('cover_image')->nullable();
            $table->string('jam');
            $table->string('fee');
            $table->string('additional_notes')->length(250)->nullable();
            $table->timestamps();
            $table->foreign('nik')->references('nik')->on('parents')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutor_criterias');
    }
};
