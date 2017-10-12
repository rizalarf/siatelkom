<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaftarSidangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_sidangs', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('idMahasiswa')->unsigned();
          $table->date('dfTanggal');
          $table->enum('dfSyarat1',[1,0])->default(0);
          $table->enum('dfSyarat2',[1,0])->default(0);
          $table->enum('dfSyarat3',[1,0])->default(0);
          $table->enum('dfSyarat4',[1,0])->default(0);
          $table->enum('dfSyarat5',[1,0])->default(0);
          $table->enum('dfSyarat6',[1,0])->default(0);
          $table->enum('dfSyarat7',[1,0])->default(0);
          $table->enum('dfSyarat8',[1,0])->default(0);
          $table->timestamps();
          $table->foreign('idMahasiswa')->references('id')->on('mahasiswas')
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
        Schema::dropIfExists('daftar_sidangs');
    }
}
