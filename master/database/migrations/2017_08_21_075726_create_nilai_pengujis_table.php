<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaiPengujisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_pengujis', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('idTugas')->unsigned();
          $table->float('ujiNilai1');
          $table->float('ujiNilai2');
          $table->float('ujiNilai3');
          $table->float('ujiNilai4');
          $table->float('ujiJumlah');
          $table->foreign('idTugas')->references('id')->on('surat_tugas')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('nilai_pengujis');
    }
}
