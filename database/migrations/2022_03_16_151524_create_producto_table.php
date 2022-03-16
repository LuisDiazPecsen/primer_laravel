<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo', 5)->unique();
            $table->string('descripcion', 200);
            $table->double('precio_compra');
            $table->double('precio_venta');
            $table->double('stock');
            $table->double('stock_minimo');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categoria');
            $table->integer('marca_id')->unsigned();
            $table->foreign('marca_id')->references('id')->on('marca');
            $table->integer('unidad_medida_id')->unsigned();
            $table->foreign('unidad_medida_id')->references('id')->on('unidad_medida');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto');
    }
}
