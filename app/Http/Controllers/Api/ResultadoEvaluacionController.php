<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\ResultadoEvaluacion;

class ResultadoEvaluacionController extends Controller
{
    public function index($grupo, Request $request)
    {
        $user = $request->user();
        if ($user->alumno) {
            $evaluaciones = ResultadoEvaluacion::select(
                'evaluacion_x_matricula.nota',
                'evaluacion.peso',
                'evaluacion.fecha',
                'tipo_evaluacion.nombre as tipo_evaluacion_nombre'
            )
            ->join('evaluacion', 'evaluacion_x_matricula.evaluacion_id', '=', 'evaluacion.id')
            ->join('tipo_evaluacion', 'evaluacion.tipo_id', '=', 'tipo_evaluacion.id')
            ->join('matricula', 'evaluacion_x_matricula.matricula_id', '=', 'matricula.id')
            ->delAlumno($user->id)
            ->where('evaluacion.grupo_id', $grupo)
            ->where('matricula.grupo_id', $grupo)
            ->get();

            return response()->json($evaluaciones);
        }

        return response()->json([
            'error' => 'Usuario no autorizado. Zona de alumnos.'
        ]);
    }
}
