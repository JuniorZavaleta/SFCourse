<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartamentoAcademico extends Model
{
    protected $table = 'departamento_academico';

    protected $fillable =  [
        'nombre',
        'facultad_id'
    ];

    public $timestamps = false;

    public function facultad()
    {
        return $this->belongsTo(Facultad::class, 'facultad_id');
    }
}
