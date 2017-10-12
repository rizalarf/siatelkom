<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idPas')->unsigned();
            $table->integer('idLapHar')->unsigned();
            $table->integer('idLapAkhir')->unsigned();
            $table->integer('idNilaiMag')->unsigned();
            $table->timestamps();
            $table->foreign('idPas')->references('id')->on('pasangans')
              ->onUpdate('cascade')
              ->onDelete('cascade');
            $table->foreign('idLapHar')->references('id')->on('laporan_harians')
              ->onUpdate('cascade')
              ->onDelete('cascade');
            $table->foreign('idLapAkhir')->references('id')->on('laporan_akhirs')
              ->onUpdate('cascade')
              ->onDelete('cascade');
            $table->foreign('idNilaiMag')->references('id')->on('nilai_magangs')
              ->onUpdate('cascade')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
