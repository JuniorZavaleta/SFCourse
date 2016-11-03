<?php

namespace App\Services;

class PdfMakerService {
    protected $path;

    function __construct()
    {
        $this->path = env('PDF_BIN_PATH');
    }

    public function create($blade_view, $data = [])
    {
        $html = view($blade_view, $data)->render();

        $filename = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'pdf-' . rand(1, 999999999);
        $html_name = $filename.'.html';
        $pdf_name  = $filename.'.pdf';

        file_put_contents($html_name, $html);

        $options = '-s A4';

        $command = $this->path . " "  . $options . " ". $html_name . " " . $pdf_name;

        exec($command);

        return $pdf_name;
    }
}