<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Empleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Empleados', function (Blueprint $table) {
            $table->increments('Id_empleado');
            $table->string('nombree',20);
            $table->string('apellidoe',30);
            $table->string('correo',30);
            $table->string('usuario',30);
            $table->string('contra',20);
            $table->string('img');
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
