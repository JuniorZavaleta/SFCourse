<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Incidente;

use App\Services\CountryCatcher;

class IncidenteController extends Controller
{
    public function index()
    {
        $incidentes = Incidente::recientes()->get();
        $paises = CountryCatcher::fetch();

        $data = [
            'incidentes' => $incidentes,
            'paises' => $paises,
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
        $incidentes = Incidente::whereNotNull('pais_nombre');
        $paises = CountryCatcher::fetch();

        if ($request->has('pais'))
            $incidentes->where('pais_nombre', $request->input('pais'));

        if ($request->has('fecha_inicio'))
            $incidentes->where('created_at' , '>=', $request->input('fecha_inicio'));

        if ($request->has('fecha_fin'))
            $incidentes->where('created_at' , '<=', $request->input('fecha_fin'));

        $incidentes = $incidentes->get();

        $data = [
            'incidentes' => $incidentes,
            'paises' => $paises,
            'pais_nombre' => $request->input('pais'),
        ];

        return view('admin.incidente.index', $data);
    }
}
