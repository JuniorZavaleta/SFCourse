<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\DepartamentoAcademico;
use App\Models\Docente;
use DB;

class DocenteController extends Controller
{
    public function index(Request $request)
    {
        $departamento_id = $request->input('departamento_id');
        $departamento    = DepartamentoAcademico::find($departamento_id);
        $docentes = $departamento->docentes()->paginate(10);

        $data = [
            'docentes'               => $docentes,
            'departamento_academico' => $departamento,
        ];

        return view('admin.docente.index', $data);
    }

    public function removeFromDepartment($docente, Request $request)
    {
        $departamento_id = $request->input('departamento_id');
        $departamento = DepartamentoAcademico::find($departamento_id);
        DB::table('docente_x_departamento')->where('docente_id', $docente->id)
                                           ->where('departamento_id', $departamento_id)
                                           ->delete();

        return redirect()
             ->route('docentes.index', ['departamento_id' => $departamento_id])
             ->with('message', 'Docente removido satisfactoriamente.');
    }
}
