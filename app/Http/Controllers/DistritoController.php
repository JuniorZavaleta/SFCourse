<?php

namespace App\Http\Controllers;

class DistritoController extends Controller
{
    public function getByProvincia($provincia)
    {
        return collect($provincia->distritos->toArray())->sortBy('nombre')->values()->all();
    }
}
