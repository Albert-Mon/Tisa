<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class Asignaciones extends Model
{
    use HasFactory;
    use Softdeletes;
    protected $primaryKey='id_asignacion';
    protected $fillable = ['id_asignacion',
                            'id',
                            'Id_empleado',
                            'id_software',
                            'fecha_entrega',
                            'pruebas'];
}
