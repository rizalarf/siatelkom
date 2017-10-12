<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revisis', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('idTugas')->unsigned();
          $table->string('revStatus');
          $table->date('revTanggal');
          $table->text('revUraian');
          $table->enum('konfirmasi',[1,0])->default(0);
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
        Schema::dropIfExists('revisis');
    }
}
