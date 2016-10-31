<?php

namespace App\Services;

class PdfMaker
{
    protected $binary_path;

    function __construct()
    {
        $this->binary_path = "xvfb-run /usr/bin/wkhtmltopdf";
    }

    /**
     * Creates a pdf file using the provided view and data. Returns the filepath
     * @param  string  $view vista a renderizar
     * @param  mixed   $data data for rendering the view on blade
     * @return string  filename of the generated pdf file
     */
    public function create($view, $data = [])
    {
        try {
            $html = view($view, $data)->render();
        } catch (Exception $e) {
            $html = "";
        }

        $filename = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'pdf-' . rand(1, 999999999);
        $html_name = $filename . '.html';
        $pdf_name = $filename . '.pdf';

        file_put_contents($html_name, $html);

        $options = "-s A4";

        $command = $this->binary_path . " " . $options . " " . $html_name. " " . $pdf_name;

        exec($command);

        return $pdf_name;
    }
}