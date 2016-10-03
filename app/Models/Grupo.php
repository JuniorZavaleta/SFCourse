<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'grupo';

    protected $fillable = [
        'numero_grupo',
        'asignatura_aperturada_id',
        'docente_id',
    ];

    public $timestamps = false;

    public function evaluaciones()
    {
        return $this->hasMany(Evaluacion::class, 'grupo_id');
    }

    public function asignatura_aperturada()
    {
        return $this->belongsTo(AsignaturaAperturada::class, 'asignatura_aperturada_id');
    }

    public function getAsignaturaNombreAttribute()
    {
        return $this->asignatura_aperturada->asignatura_nombre;
    }
}
