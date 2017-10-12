<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgtasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progtas', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('idJudul')->unsigned();
          $table->text('ptaProgBimb');
          $table->text('ptaProgTA');
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
        Schema::dropIfExists('progtas');
    }
}
