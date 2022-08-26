<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Software extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('software', function(Blueprint $table){
            $table->increments('id_software');
            $table->string('nombre', 250);
            $table->string('descripcion', 250);

            $table->integer('Id_empleado')->unsigned();
            $table->foreign('Id_empleado') -> references ('Id_empleado')-> on ('empleados');//aqui la llave foranea busca la tabla de donde viene

            $table->string('pruebas', 40);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');

            $table->rememberToken();
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
