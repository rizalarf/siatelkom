<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalKuliahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_kuliahs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idKelas')->unsigned();
            $table->integer('idHari')->unsigned();
            $table->integer('idJam')->unsigned();
            $table->integer('idMakul')->unsigned();
            $table->integer('idPengampu')->unsigned();
            $table->integer('idRuang')->unsigned();
            $table->timestamps();
            $table->foreign('idKelas')->references('id')->on('kelas')
              ->onUpdate('cascade')
              ->onDelete('cascade');
            $table->foreign('idHari')->references('id')->on('haris')
              ->onUpdate('cascade')
              ->onDelete('cascade');
            $table->foreign('idJam')->references('id')->on('jams')
              ->onUpdate('cascade')
              ->onDelete('cascade');
            $table->foreign('idMakul')->references('id')->on('mata_kuliahs')
              ->onUpdate('cascade')
              ->onDelete('cascade');
            $table->foreign('idPengampu')->references('id')->on('pengampus')
              ->onUpdate('cascade')
              ->onDelete('cascade');
            $table->foreign('idRuang')->references('id')->on('ruangs')
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
        Schema::dropIfExists('jadwal_kuliahs');
    }
}
