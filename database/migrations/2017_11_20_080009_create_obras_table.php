<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obras', function (Blueprint $table) {
          $table->increments('id');
          $table->float('subtotal', 8, 2)->default(0);

          $table->integer('id_actividad')->unsigned();
          $table->foreign('id_actividad')->references('id')->on('actividads');

          $table->integer('id_proyecto')->unsigned();
          $table->foreign('id_proyecto')->references('id')->on('proyectos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obras');
    }
}
