<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembimbingLapangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembimbing_lapangans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pembNik');
            $table->string('pembNama');
            $table->string('pembEmail');
            $table->string('pembKontak');
            $table->integer('idPerus')->unsigned();
            $table->timestamps();
            $table->foreign('idPerus')->references('id')->on('perusahaans')
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
        Schema::dropIfExists('pembimbing_lapangans');
    }
}
