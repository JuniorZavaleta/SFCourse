<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\DepartamentoAcademico;
use App\Models\Docente;

class DocenteController extends Controller
{
    public function index($departamento_academico)
    {
        $departamento_id = $departamento_academico->id;
        $departamento = DepartamentoAcademico::find($departamento_id);
        $docentes = $departamento->docentes()->paginate(10);

        $data = [
            'docentes'               => $docentes,
            'departamento_academico' => $departamento,
        ];

        return view('admin.docente.index', $data);
    }
}
