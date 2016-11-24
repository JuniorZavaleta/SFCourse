<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Facultad;
use App\Models\DepartamentoAcademico;

use App\Http\Requests\Admin\DepartamentoAcademico\StoreRequest;

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

    public function store($facultad, StoreRequest $request)
    {
        $departamento = DepartamentoAcademico::create($request->all());

        return redirect()
             ->route('facultades.departamentos.index', ['facultad' => $facultad->id])
             ->with('message', 'Departamento academico creado satisfactoriamente.');
    }

    public function edit($facultad, $departamento)
    {
        $data = [
            'departamento' => $departamento,
            'facultad'     => $facultad,
        ];

        return view('admin.departamento_academico.edit', $data);
    }

    public function update($facultad, $departamento, StoreRequest $request)
    {
        $departamento->update($request->all());

        return redirect()
             ->route('facultades.departamentos.index', ['facultad' => $facultad->id])
             ->with('message', 'Departamento academico actualizado satisfactoriamente.');
    }

    public function delete($facultad, $departamento)
    {
        $departamento->delete();
        return redirect()
             ->route('facultades.departamentos.index', ['facultad' => $facultad->id])
             ->with('message', 'Departamento academico eliminado satisfactoriamente.');
    }

}
