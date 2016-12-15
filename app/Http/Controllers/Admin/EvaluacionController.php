<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\Evaluacion\StoreRequest;

use App\Models\Evaluacion;
use App\Models\TipoEvaluacion;
use Auth;

class EvaluacionController extends Controller
{
    public function index($grupo)
    {
        $asignatura = $grupo->asignatura_aperturada->asignatura;
        $evaluaciones = $grupo->evaluaciones()->paginate(10);
        $usuario = Auth::user();

        $data = [
            'asignatura' => $asignatura,
            'evaluaciones' => $evaluaciones,
            'grupo' => $grupo,
            'usuario' => $usuario,
        ];

        return view('admin.evaluacion.index', $data);
    }

    public function create($grupo)
    {
        $asignatura = $grupo->asignatura_aperturada->asignatura;
        $tipo_evaluaciones = TipoEvaluacion::all();

        $data = [
            'asignatura' => $asignatura,
            'grupo' => $grupo,
            'tipo_evaluaciones' => $tipo_evaluaciones,
        ];

        return view('admin.evaluacion.create', $data);
    }

    public function store($grupo, StoreRequest $request)
    {
        Evaluacion::create($request->all());

        return redirect()
             ->route('grupos.evaluaciones.index', ['grupo' => $grupo->id])
             ->with('message', 'Evaluacion creada satisfactoriamente.');
    }

    public function edit($grupo, $evaluacion)
    {
        $asignatura = $grupo->asignatura_aperturada->asignatura;
        $tipo_evaluaciones = TipoEvaluacion::all();

        $data = [
            'asignatura' => $asignatura,
            'grupo' => $grupo,
            'evaluacion' => $evaluacion,
            'tipo_evaluaciones' => $tipo_evaluaciones,
        ];

        return view('admin.evaluacion.edit', $data);
    }

    public function update($grupo, $evaluacion, StoreRequest $request)
    {
        $evaluacion->update($request->all());

        return redirect()
             ->route('grupos.evaluaciones.index', ['grupo' => $grupo->id])
             ->with('message', 'Evaluacion actualizada satisfactoriamente.');
    }

    public function delete($grupo, $evaluacion)
    {
        $evaluacion->delete();

        return redirect()
             ->route('grupos.evaluaciones.index', ['grupo' => $grupo->id])
             ->with('message', 'Evaluacion eliminada satisfactoriamente.');
    }
}
