<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Periodo;
use App\Models\Facultad;
use App\Models\TipoPeriodo;

use App\Http\Requests\Admin\Periodo\StoreRequest;

class PeriodoController extends Controller
{
    public function index($facultad)
    {
        $periodos = $facultad->periodos()->paginate(10);

        $data = [
            'periodos'  => $periodos,
            'facultad'  => $facultad,
        ];

        return view('admin.periodo.index', $data);

    }

    public function create($facultad)
    {
        $tipos_periodo = TipoPeriodo::all();
        $data = [
            'facultad'      => $facultad,
            'tipos_periodo' => $tipos_periodo,
        ];

        return view('admin.periodo.create', $data);
    }

    public function store($facultad, StoreRequest $request)
    {
        $periodo = Periodo::create($request->all());

        return redirect()
             ->route('facultades.periodos.index', ['facultad' => $facultad->id])
             ->with('message', 'Periodo academico creado satisfactoriamente.');
    }

    public function edit($facultad, $periodo)
    {
        $tipos_periodo = TipoPeriodo::all();
        $data = [
            'periodo'       => $periodo,
            'facultad'      => $facultad,
            'tipos_periodo' => $tipos_periodo,
        ];

        return view('admin.periodo.edit', $data);
    }

    public function update($facultad, $periodo, StoreRequest $request)
    {
        $periodo->update($request->all());

        return redirect()
             ->route('facultades.periodos.index', ['facultad' => $facultad->id])
             ->with('message', 'Periodo academico actualizado satisfactoriamente.');
    }

    public function delete($facultad, $periodo)
    {
        $periodo->delete();

        return redirect()
             ->route('facultades.periodos.index', ['facultad' => $facultad->id])
             ->with('message', 'Periodo academico eliminado satisfactoriamente.');
    }
}
