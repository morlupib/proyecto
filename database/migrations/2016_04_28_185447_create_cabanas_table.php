<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCabanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabanas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->mediumtext('descripcion');
            $table->float('precio');
            $table->string('direccion');
            $table->double('latitud');
            $table->double('longitud');
            $table->timestamps();
            $table->softDeletes();
            
            $table->integer('propietario_id')->unsigned();
            $table->foreign('propietario_id')->references('id')->on('propietarios');
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cabanas');
    }
}
