<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiwayatPendidikansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_pendidikans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idMahasiswa')->unsigned();
            $table->integer('riSemester');
            $table->integer('idKelas')->unsigned();
            $table->integer('riTahunAkt');
            $table->integer('idProdi')->unsigned();
            $table->timestamps();
            $table->foreign('idMahasiswa')->references('id')->on('mahasiswas')
              ->onUpdate('cascade')
              ->onDelete('cascade');
            $table->foreign('idKelas')->references('id')->on('kelas')
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
        Schema::dropIfExists('riwayat_pendidikans');
    }
}
