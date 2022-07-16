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
        Schema::create('data_gempas', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->nullable();
            $table->time('jam')->nullable();
            // $table->decimal('latitude', 10, 8)->nullable();
            // $table->decimal('longitude', 11, 8)->nullable();
            // $table->double('magnitude', 5)->nullable();
            $table->string('latitude', 20)->nullable();
            $table->enum('label_koor_lintang', ['LS','LU'])->nullable();
            $table->string('longitude', 20)->nullable();
            $table->enum('label_koor_bujur', ['BT','BB'])->nullable();
            $table->string('magnitude', 10)->nullable();

                        
            $table->string('kedalaman', 50)->nullable();
            $table->text('wilayah')->nullable();
            $table->text('dirasakan')->nullable();
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
        Schema::dropIfExists('data_gempas');
    }
};
