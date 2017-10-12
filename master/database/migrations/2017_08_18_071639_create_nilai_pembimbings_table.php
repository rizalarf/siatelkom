<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaiPembimbingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_pembimbings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idJudul')->unsigned();
            $table->float('npNilai1');
            $table->float('npNilai2');
            $table->float('npNilai3');
            $table->float('npNilai4');
            $table->float('npJumlah');
            $table->foreign('idJudul')->references('id')->on('juduls')
              ->onUpdate('cascade')
              ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_pembimbings');
    }
}
