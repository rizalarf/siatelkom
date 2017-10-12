<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaiMagangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_magangs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idPas')->unsigned();
            $table->integer('idNilPemb')->unsigned();
            $table->integer('idNilDos')->unsigned();
            $table->timestamps();
            $table->foreign('idPas')->references('id')->on('pasangans')
              ->onUpdate('cascade')
              ->onDelete('cascade');
            $table->foreign('idNilPemb')->references('id')->on('nilai_pemb_laps')
              ->onUpdate('cascade')
              ->onDelete('cascade');
            $table->foreign('idNilDos')->references('id')->on('nilai_dosens')
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
        Schema::dropIfExists('nilai_magangs');
    }
}
