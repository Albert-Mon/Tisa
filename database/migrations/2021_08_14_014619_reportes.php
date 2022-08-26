<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reportes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('reportes', function (Blueprint $table) {
          $table->increments('id_reporte');
          $table->date('fecha_inicio');
          $table->date('fecha_fin');

          $table->integer('Id_empleado')->unsigned();
          $table->foreign('Id_empleado') -> references ('Id_empleado')-> on ('empleados');

          $table->integer('id_software')->unsigned();
          $table->foreign('id_software') -> references ('id_software')-> on ('software');

          $table->string('descripcion');
          $table->string('revision');

          $table->integer('id')->unsigned();
          $table->foreign('id') -> references ('id')-> on ('users');

          $table->integer('id_asignacion')->unsigned();
          $table->foreign('id_asignacion') -> references ('id_asignacion')-> on ('asignaciones');

          $table->string('observaciones');
          $table->string('estatus');
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
