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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('NIM')->unique();
            $table->string('Name');
            $table->string('J_Kelamin');
            $table->string('IPS_1');
            $table->string('IPS_2');
            $table->string('IPS_3');
            $table->string('IPS_4');
            $table->string('Jalur_Masuk');
            $table->string('Tahun_Angkatan');
            $table->string('Keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
