<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRekapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekaps', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('idTugas')->unsigned();
          $table->float('rekNilai1');
          $table->float('rekNilai2');
          $table->float('rekNilai3');
          $table->timestamps();
          $table->foreign('idTugas')->references('id')->on('surat_tugas')
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
        Schema::dropIfExists('rekaps');
    }
}
