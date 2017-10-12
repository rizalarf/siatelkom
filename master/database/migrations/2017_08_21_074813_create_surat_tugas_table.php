<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuratTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_tugas', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('idJudul')->unsigned();
          $table->date('stPengajuan');
          $table->string('stNoSurat');
          $table->date('stTglSid');
          $table->time('stWktSid');
          $table->integer('idRuang')->unsigned();
          $table->integer('stPS')->unsigned();
          $table->integer('stP1')->unsigned();
          $table->integer('stP2')->unsigned();
          $table->integer('stP3')->unsigned();
          $table->timestamps();
          $table->foreign('idJudul')->references('id')->on('juduls')
            ->onUpdate('cascade')
            ->onDelete('cascade');
          $table->foreign('idRuang')->references('id')->on('ruangs')
            ->onUpdate('cascade')
            ->onDelete('cascade');
          $table->foreign('stPS')->references('id')->on('dosens')
            ->onUpdate('cascade')
            ->onDelete('cascade');
          $table->foreign('stP1')->references('id')->on('dosens')
            ->onUpdate('cascade')
            ->onDelete('cascade');
          $table->foreign('stP2')->references('id')->on('dosens')
            ->onUpdate('cascade')
            ->onDelete('cascade');
          $table->foreign('stP3')->references('id')->on('dosens')
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
        Schema::dropIfExists('surat_tugas');
    }
}
