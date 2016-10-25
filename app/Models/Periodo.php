<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    protected $table = 'periodo_academico';

    protected $fillable = [
        'nombre',
        'fecha_inicio',
        'fecha_fin',
        'facultad_id',
        'tipo_id',
    ];

    public $timestamps = false;

    public function tipo_periodo()
    {
        return $this->belongsTo(TipoPeriodo::class, 'tipo_id');
    }

    public function facultad()
    {
        return $this->belongsTo(Facultad::class, 'facultad_id');
    }

    public function asignatura_aperturada()
    {
        return $this->hasMany(AsignaturaAperturada::class);
    }
}
