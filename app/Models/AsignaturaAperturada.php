<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsignaturaAperturada extends Model
{
    protected $table = 'asignatura_aperturada';

    public $timestamps = false;

    public function grupos()
    {
        return $this->hasMany(Grupo::class, 'asignatura_aperturada_id');
    }

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class, 'asignatura_id');
    }

    public function getAsignaturaNombreAttribute()
    {
        return $this->asignatura->nombre;
    }

    public function periodo()
    {
        return $this->belongsTo(Periodo::class, 'periodo_id');
    }
}
