<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBimbinganEndsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bimbingan_ends', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('idJudul')->unsigned();
          $table->date('endTanggal');
          $table->timestamps();
          $table->foreign('idJudul')->references('id')->on('juduls')
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
        Schema::dropIfExists('bimbingan_ends');
    }
}
