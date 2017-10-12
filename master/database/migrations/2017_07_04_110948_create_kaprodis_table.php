<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaprodisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kaprodis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idDosen')->unsigned();
            $table->date('kapMulai');
            $table->integer('idProdi')->unsigned();
            $table->timestamps();
            $table->foreign('idDosen')->references('id')->on('dosens')
              ->onUpdate('cascade')
              ->onDelete('cascade');
            $table->foreign('idProdi')->references('id')->on('program_studis')
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
        Schema::dropIfExists('kaprodis');
    }
}
