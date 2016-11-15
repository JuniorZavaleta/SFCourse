<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Docente;
use App\Models\Grupo;
use Auth;

class GrupoController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->docente) {
            $grupos = Grupo::where('docente_id', $user->id)->get();
        } elseif ($user->alumno) {
            $grupos = Grupo::delAlumno($user->id)->get();
        }

        $data = [
            'grupos' => $grupos,
        ];

        return view('admin.grupo.index', $data);
    }
}
