<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class Empleados extends Model
{
    use HasFactory;
    use Softdeletes;

    protected $primaryKey='Id_empleado';
    protected $fillable = ['Id_empleado','nombree','apellidoe','correo','usuario','contra','img'];
}
