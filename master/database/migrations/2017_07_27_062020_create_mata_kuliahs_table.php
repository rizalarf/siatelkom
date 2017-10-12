<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMataKuliahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mata_kuliahs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('makulKode');
            $table->string('makulNama');
            $table->integer('idKur')->unsigned();
            $table->string('makulSemester');
            $table->integer('makulSks');
            $table->integer('makulJam');
            $table->timestamps();
            $table->foreign('idKur')->references('id')->on('kurikulums')
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
        Schema::dropIfExists('mata_kuliahs');
    }
}
