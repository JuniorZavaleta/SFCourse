<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Incidente;

use App\Services\CountryCatcher;

use Carbon\Carbon;

class IncidenteController extends Controller
{
    public function index()
    {
        $paises = CountryCatcher::fetch();

        $fecha_inicio = Carbon::now()->subMonths(2);
        $fecha_fin    = Carbon::now();

        $incidentes = Incidente::betweenDates($fecha_inicio, $fecha_fin)->get();

        $data = [
            'incidentes' => $incidentes,
            'paises' => $paises,
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin' => $fecha_fin,
        ];

        return view('admin.incidente.index', $data);
    }

    public function show($incidente)
    {
        $data = [
            'incidente' => $incidente,
        ];

        return view('admin.incidente.show', $data);
    }

    public function filter(Request $request)
    {
        $incidentes = new Incidente;
        $paises = CountryCatcher::fetch();

        if ($request->has('pais')) {
            $incidentes->where('pais_nombre', $request->input('pais'));
        }

        $fecha_inicio = $request->input('fecha_inicio');
        if ($fecha_inicio) {
            $fecha_inicio = Carbon::createFromFormat('Y-m-d', $fecha_inicio);
        } else {
            $fecha_inicio = Carbon::now();
        }

        $fecha_fin = $request->input('fecha_fin');
        if ($fecha_fin) {
            $fecha_fin = Carbon::createFromFormat('Y-m-d', $fecha_fin);
        } else {
            $fecha_fin = Carbon::now();
        }

        $incidentes = $incidentes->betweenDates($fecha_inicio, $fecha_fin)->get();

        $data = [
            'incidentes' => $incidentes,
            'paises' => $paises,
            'pais_nombre' => $request->input('pais'),
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin' => $fecha_fin,
        ];

        return view('admin.incidente.index', $data);
    }
}
