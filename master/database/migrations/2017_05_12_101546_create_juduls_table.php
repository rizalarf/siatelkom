<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJudulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juduls', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('idMahasiswa')->unsigned();
          $table->string('jdJudul');
          $table->integer('idDosbing1')->unsigned();
          $table->integer('idDosbing2')->unsigned();
          $table->timestamps();
          $table->foreign('idMahasiswa')->references('id')->on('mahasiswas')
            ->onUpdate('cascade')
            ->onDelete('cascade');
          $table->foreign('idDosbing1')->references('id')->on('dosens')
            ->onUpdate('cascade')
            ->onDelete('cascade');
          $table->foreign('idDosbing2')->references('id')->on('dosens')
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
        Schema::dropIfExists('juduls');
    }
}
