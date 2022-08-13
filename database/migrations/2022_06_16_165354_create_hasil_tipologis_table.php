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
        Schema::create('hasil_tipologis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_titik')->nullable();
            $table->string('nilai_geologi_fisik',5)->nullable();
            $table->string('nilai_kemiringan_lereng',5)->nullable();
            $table->string('nilai_kegempaan',5)->nullable();
            $table->string('nilai_kemampuan_struktur_geologi',5)->nullable();
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
        Schema::dropIfExists('hasil_tipologis');
    }
};
