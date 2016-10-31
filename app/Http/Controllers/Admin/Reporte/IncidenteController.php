<?php

namespace App\Http\Controllers\Admin\Reporte;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Incidente;

use App\Services\CountryCatcher;
use App\Services\PdfMaker;

class IncidenteController extends Controller
{
    protected $pdf_service;

    public function __construct(PdfMaker $pdf_service)
    {
        $this->pdf_service = $pdf_service;
    }

    public function getByCountry()
    {
        $incidentes = Incidente::all();

        $data = [
            'incidentes' => $incidentes,
        ];

        $filename = $this->pdf_service->create('reportes.incidente.index', $data);

        return response()->download($filename, 'reporte_por_pais.pdf');
    }
}
