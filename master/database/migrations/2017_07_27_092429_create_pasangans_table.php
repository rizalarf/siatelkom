<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasangans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idMahasiswa')->unsigned();
            $table->integer('idDosen')->unsigned();
            $table->integer('idPemb')->unsigned();
            $table->integer('idPerus')->unsigned();
            $table->timestamps();
            $table->foreign('idMahasiswa')->references('id')->on('mahasiswas')
              ->onUpdate('cascade')
              ->onDelete('cascade');
            $table->foreign('idDosen')->references('id')->on('dosens')
              ->onUpdate('cascade')
              ->onDelete('cascade');
            $table->foreign('idPemb')->references('id')->on('pembimbing_lapangans')
              ->onUpdate('cascade')
              ->onDelete('cascade');
            $table->foreign('idPerus')->references('id')->on('perusahaans')
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
        Schema::dropIfExists('pasangans');
    }
}
