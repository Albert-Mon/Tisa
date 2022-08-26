<?php

namespace App\Imports;

use App\Administradores;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AdministradoresImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Administradores([
            'clave' => $row['clave'],
            'nusuario' => $row['nusuario'],
            'name' => $row['name'],
            'app' => $row['app'],
            'apm' => $row['apm'],
            'email' => $row['email'],
            'password' => $row['password'],
        ]);
    }
}
