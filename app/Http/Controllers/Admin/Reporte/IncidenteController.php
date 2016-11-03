<?php

namespace App\Http\Controllers\Admin\Reporte;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Services\PdfMakerService;

use App\Models\Incidente;

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
}
