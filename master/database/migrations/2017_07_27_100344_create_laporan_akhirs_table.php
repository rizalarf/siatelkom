<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaporanAkhirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_akhirs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idPas')->unsigned();
            $table->date('lapakTanggal');
            $table->text('lapakIsi');
            $table->text('lapakKomen');
            $table->timestamps();
            $table->foreign('idPas')->references('id')->on('pasangans')
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
        Schema::dropIfExists('laporan_akhirs');
    }
}
