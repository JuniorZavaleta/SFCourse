<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Facultad;
use App\Models\DepartamentoAcademico;

class DepartamentoAcademicoController extends Controller
{
    public function index($facultad)
    {
        $departamentos = $facultad->departamentosAcademicos()->paginate(10);
        $data = [
            'facultad'      => $facultad,
            'departamentos' => $departamentos,
        ];

        return view('admin.departamento_academico.index', $data);
    }

    public function create($facultad)
    {
        $data = [
            'facultad' => $facultad,
        ];

        return view('admin.departamento_academico.create', $data);
    }
}
