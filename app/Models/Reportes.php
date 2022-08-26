<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class Reportes extends Model
{
    use HasFactory;
    use Softdeletes;
    protected $primaryKey='id_reporte';
    protected $fillable = ['id_reporte',
                            'fecha_inicio',
                            'fecha_fin',
                            'Id_empleado',
                            'id_software',
                            'descripcion',
                            'revision',
                            'id',
                            'id_asignacion',
                            'observaciones',
                            'estatus'];
}
