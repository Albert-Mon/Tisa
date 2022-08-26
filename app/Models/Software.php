<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;       //para que borre logicamente

class Software extends Model
{
    use HasFactory;
    use Softdeletes;
    protected $primaryKey='id_software';
    protected $fillable = ['id_software',
                            'nombre',
                            'descripcion',
                            'Id_empleado',
                            'pruebas',
                            'fecha_inicio',
                            'fecha_fin'];
}
