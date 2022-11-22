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
        Schema::create('tipologi_kawasans', function (Blueprint $table) {
            $table->increments('id_tipologi');
            $table->char('geologi_batuan',2)->nullable();
            $table->char('lereng',2)->nullable();
            $table->char('kegempaan',2)->nullable();
            $table->char('struktur_geologi',2)->nullable();
            $table->string('skor',2)->nullable();
            $table->foreignId('id_informasi_tipologi',1)->nullable();
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
        Schema::dropIfExists('tipologi_kawasans');
    }
};
