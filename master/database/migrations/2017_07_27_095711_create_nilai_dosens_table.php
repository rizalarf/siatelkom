<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaiDosensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_dosens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idPas')->unsigned();
            $table->float('ndosNilai');
            $table->string('ndosKet');
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
        Schema::dropIfExists('nilai_dosens');
    }
}
