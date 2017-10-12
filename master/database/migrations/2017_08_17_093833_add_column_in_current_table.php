<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnInCurrentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('dosens', function (Blueprint $table) {
          $table->string('idLogin')->nullable()->unique()->after('dosKontak');
      });
      Schema::table('mahasiswas', function (Blueprint $table) {
          $table->string('idLogin')->nullable()->unique()->after('mhsKontak');
      });
      Schema::table('kaprodis', function (Blueprint $table) {
          $table->string('idLogin')->nullable()->unique()->after('idProdi');
      });
      Schema::table('pembimbing_lapangans', function (Blueprint $table) {
          $table->string('idLogin')->nullable()->unique()->after('idPerus');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
