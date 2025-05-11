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
        Schema::create('setting_absens', function (Blueprint $table) {
            $table->id();
            $table->time('jam_masuk');
            $table->time('jam_keluar');
            $table->string('lokasi'); 
            $table->integer('batas_jarak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting_absens');
    }
};
