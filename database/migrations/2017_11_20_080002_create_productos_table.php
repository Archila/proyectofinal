<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombre',50);
          $table->string('descripcion',250);
          $table->float('precio', 8, 2)->default(0);
          $table->string('unidad',50);
          $table->string('marca',50);
          $table->integer('id_proveedor')->unsigned();
          $table->foreign('id_proveedor')->references('id')->on('proveedors');
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
        Schema::dropIfExists('productos');
    }
}
