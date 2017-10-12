<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiapSidangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siap_sidangs', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('idJudul')->unsigned();
          $table->date('ssTanggal');
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
        Schema::dropIfExists('siap_sidangs');
    }
}
