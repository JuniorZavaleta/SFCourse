<?php

namespace App\Http\Controllers\Admin\Reporte;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Services\PdfMakerService;

use App\Models\Incidente;

use Carbon\Carbon;

class IncidenteController extends Controller
{
    protected $pdf_service;

    public function __construct(PdfMakerService $pdf_service) {
        $this->pdf_service = $pdf_service;
    }

    public function getByCountry(Request $request)
    {
        $pais = $request->input('pais');
        $incidentes = Incidente::where('pais_nombre', $pais)->get();

        $data = [
            'pais' => $pais,
            'incidentes' => $incidentes,
        ];

        $filename = $this->pdf_service->create('reportes.incidente.por_pais', $data);

        return response()->download($filename, 'reporte_por_pais.pdf');
    }

    public function betweenDates(Request $request)
    {
        $fecha_inicio = $request->input('fecha_inicio', date('Y-m-d'));
        $fecha_fin    = $request->input('fecha_fin', date('Y-m-d'));

        $fecha_inicio = Carbon::createFromFormat("Y-m-d", $fecha_inicio);
        $fecha_fin = Carbon::createFromFormat("Y-m-d", $fecha_fin);

        $incidentes = Incidente::betweenDates($fecha_inicio, $fecha_fin)->get();

        $data = [
            'incidentes' => $incidentes,
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin' => $fecha_fin,
        ];

        $filename = $this->pdf_service->create('reportes.incidente.entre_fechas', $data);

        return response()->download($filename, 'reporte_entre_fechas.pdf');
    }
}
