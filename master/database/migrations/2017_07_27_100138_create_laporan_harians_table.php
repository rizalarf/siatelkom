<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaporanHariansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_harians', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idPas')->unsigned();
            $table->date('lapTanggal');
            $table->text('lapIsi');
            $table->text('lapKomen');
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
        Schema::dropIfExists('laporan_harians');
    }
}
