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
        Schema::create('calculasi_metodes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_titik')->nullable();
            $table->foreignId('id_geologi_fisik')->nullable();
            $table->foreignId('id_kemiringan_lereng')->nullable();
            $table->foreignId('id_kegempaan')->nullable();
            $table->foreignId('id_struktur_geologi')->nullable();
            $table->integer('hasil_score')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calculasi_metodes');
    }
};
