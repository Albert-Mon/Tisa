<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Asignaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('asignaciones', function (Blueprint $table) {
          $table->increments('id_asignacion');

          $table->integer('id_software')->unsigned();
          $table->foreign('id_software') -> references ('id_software')-> on ('software');

          $table->integer('Id_empleado')->unsigned();
          $table->foreign('Id_empleado') -> references ('Id_empleado')-> on ('empleados');

          $table->integer('id')->unsigned();
          $table->foreign('id') -> references ('id')-> on ('users');

          $table->date('fecha_entrega');
          $table->string('pruebas');
          $table->remembertoken();
          $table->softDeletes();
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
        //
    }
}
