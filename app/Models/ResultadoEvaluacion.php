<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResultadoEvaluacion extends Model
{
    protected $table = 'evaluacion_x_matricula';

    public $timestamps = false;

    public function evaluacion()
    {
        return $this->belongsTo(Evaluacion::class, 'evaluacion_id');
    }

    public function matricula()
    {
        return $this->belongsTo(Matricula::class, 'matricula_id');
    }

    public function scopeDelAlumno($query, $alumno_id)
    {
        $query->whereHas('matricula', function($matricula) use ($alumno_id) {
            $matricula->where('alumno_id', $alumno_id);
        });

        return $query;
    }
}
