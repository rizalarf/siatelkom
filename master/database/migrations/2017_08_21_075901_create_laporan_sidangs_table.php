<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaporanSidangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_sidangs', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('idTugas')->unsigned();
          $table->float('nilBimb');
          $table->float('nilUji');
          $table->float('nilAkhir');
          $table->string('hasilAkhir');
          $table->timestamps();
          $table->foreign('idTugas')->references('id')->on('surat_tugas')
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
        Schema::dropIfExists('laporan_sidangs');
    }
}
