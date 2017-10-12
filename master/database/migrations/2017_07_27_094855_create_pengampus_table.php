<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengampusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengampus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idDosen')->unsigned();
            $table->integer('idMakul')->unsigned();
            $table->timestamps();
            $table->foreign('idDosen')->references('id')->on('dosens')
              ->onUpdate('cascade')
              ->onDelete('cascade');
            $table->foreign('idMakul')->references('id')->on('mata_kuliahs')
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
        Schema::dropIfExists('pengampus');
    }
}
