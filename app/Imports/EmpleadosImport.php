<?php

namespace App\Imports;

use App\Models\Empleados;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmpleadosImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Empleados([
            'Id_empleado' => $row['Id_empleado'],
            'nombree' => $row['nombree'],
            'apellidoe' => $row['apellidoe'],
            'correo' => $row['correo'],
            'usuario' => $row['usuario'],
            'contra' => $row['contra'],
        ]);
    }
}
