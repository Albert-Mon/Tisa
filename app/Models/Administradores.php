<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;       //para que borre logicamente


class Administradores extends Model
{
    use HasFactory;
    use Softdeletes;
    protected $primaryKey='clave';
    protected $fillable = ['clave',
                            'img',
                            'nusuario',
                            'name',
                            'app',
                            'apm',
                            'email',
                            'password'];
}
