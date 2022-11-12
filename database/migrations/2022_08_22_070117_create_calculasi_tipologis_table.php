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
        Schema::create('calculasi_tipologis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_gempa')->nullable();
            $table->foreignId('id_titik')->nullable();

            $table->integer('hasil_kali_bobot_geologi_fisik')->nullable();
            $table->string('ket_geologi_fisik', 5)->nullable();

            $table->integer('hasil_kali_bobot_lereng')->nullable();
            $table->string('ket_lereng', 5)->nullable();
            $table->string('hasil_pga', 50)->nullable();
            $table->integer('nilai_kemampuan_pga')->nullable();
            $table->string('ket_pga', 5)->nullable();
            $table->integer('hasil_kali_bobot_pga')->nullable();


            $table->string('hasil_jarak_struktur_geologi', 50)->nullable();
            $table->integer('nilai_kemampuan_struktur_geologi')->nullable();
            $table->string('ket_struktur_geologi', 5)->nullable();
            $table->integer('hasil_kali_bobot_struktur_geologi')->nullable();

            $table->integer('skor_akhir')->nullable();
            $table->enum('kategori', ['rendah','sedang','tinggi'])->nullable();
            $table->foreignId('id_tipologi')->nullable();
            $table->enum('label_tipologi', ['Y','N'])->nullable();
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
        Schema::dropIfExists('calculasi_tipologis');
    }
};
