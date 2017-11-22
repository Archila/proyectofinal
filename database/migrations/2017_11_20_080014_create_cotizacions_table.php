<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizacions', function (Blueprint $table) {
          $table->increments('id');
          $table->float('cantidad', 8, 2)->default(0);
          $table->float('subtotal', 8, 2)->default(0);

          $table->integer('id_producto')->unsigned();
          $table->foreign('id_producto')->references('id')->on('productos');

          $table->integer('id_obra')->unsigned();
          $table->foreign('id_obra')->references('id')->on('obras');

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
        Schema::dropIfExists('cotizacions');
    }
}
