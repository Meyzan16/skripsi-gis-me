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
        Schema::create('data_titiks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_geologi_fisik')->nullable();
            $table->string('bebatuan',200)->nullable();
            $table->foreignId('id_kemiringan_lereng')->nullable();
            $table->integer('ketinggian')->nullable();
            $table->double('jarak')->nullable();
            $table->double('derajat_kemiringan')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->text('alamat')->nullable();
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
        Schema::dropIfExists('data_titiks');
    }
};
