<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Grupo;

use Auth;

class GrupoController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        if ($user->alumno) {
            $grupos = Grupo::select('grupo.id as grupo_id',
                                    'grupo.numero_grupo',
                                    'asignatura.nombre as nombre',
                                    'asignatura.ciclo as ciclo',
                                    'usuario.nombres as nombre_profesor')
                ->delAlumno($user->id)
                ->join('asignatura_aperturada', 'asignatura_aperturada.id', '=', 'grupo.asignatura_aperturada_id')
                ->join('asignatura', 'asignatura.id', '=', 'asignatura_aperturada.asignatura_id')
                ->join('docente', 'docente.id', '=', 'grupo.docente_id')
                ->join('usuario', 'usuario.id', '=', 'docente.id')
                ->get();

            return response()->json($grupos);
        } else {
            return response()->json([
                'error' => 'Usuario no autorizado. Zona de alumnos.'
            ]);
        }
    }
}
