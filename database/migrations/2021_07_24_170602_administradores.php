<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Administradores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administradores', function(Blueprint $table){
            $table->increments('clave');
            $table->string('img',300);
            $table->string('nusuario',20);
            $table->string('nombre',20);
            $table->string('app',20);
            $table->string('apm',20);
            $table->string('correo',30)->unique();
            $table->string('pass',20);
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
