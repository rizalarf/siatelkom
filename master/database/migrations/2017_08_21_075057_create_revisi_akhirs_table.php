<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevisiAkhirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revisi_akhirs', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('idTugas')->unsigned();
          $table->date('raTanggal');
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
        Schema::dropIfExists('revisi_akhirs');
    }
}
