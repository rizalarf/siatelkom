<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBimbingansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bimbingans', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('idJudul')->unsigned();
          $table->date('bbTanggal');
          $table->integer('bbMinggu');
          $table->text('bbUraian');
          $table->enum('konfirmasi',[1,0])->default(0);
          $table->timestamps();
          $table->foreign('idjudul')->references('id')->on('juduls')
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
        Schema::dropIfExists('bimbingans');
    }
}
