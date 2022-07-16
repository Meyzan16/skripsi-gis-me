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
        Schema::create('nilai_kegempaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_gempa')->nullable();
            $table->foreignId('id_titik')->nullable();
            $table->integer('nilai_pga')->nullable();
            $table->integer('nilai_kemampuan')->nullable();
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
        Schema::dropIfExists('nilai_kegempaans');
    }
};
