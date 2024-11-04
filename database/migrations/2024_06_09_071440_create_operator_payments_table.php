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
        Schema::create('operator_payments', function (Blueprint $table) {
            $table->id();
            $table->string('operator_name')->length(150);
            $table->string('provinsi');
            $table->enum('status',['Paid','Unpaid']);
            $table->string('proof')->length(250);
            $table->timestamps();
            $table->foreign('operator_name')->references('nik')->on('operators')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operator_payments');
    }
};
