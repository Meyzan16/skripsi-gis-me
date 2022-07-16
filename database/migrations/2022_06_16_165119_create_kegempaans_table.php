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
        Schema::create('kegempaans', function (Blueprint $table) {
            $table->id();
            $table->string('MMI' , 100)->nullable();
            $table->string('PGA', 100)->nullable();
            $table->string('richter', 100)->nullable();
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
        Schema::dropIfExists('kegempaans');
    }
};
