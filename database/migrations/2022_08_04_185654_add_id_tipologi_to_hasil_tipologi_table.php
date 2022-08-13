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
        Schema::table('hasil_tipologis', function (Blueprint $table) {
            $table->foreignId('id_gempa')->after('nilai_kemampuan_struktur_geologi')->nullable();
            $table->foreignId('id_tipologi')->after('id_gempa')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hasil_tipologis', function (Blueprint $table) {
            $table->dropColumn('id_tipologi');
        });
    }
};
