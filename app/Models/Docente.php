<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table = 'docente';

    public $timestamps = false;

    public function grupos()
    {
        return $this->hasMany(Grupo::class, 'docente_id');
    }

    public function user()
    {
        return $this->belongsTo(Usuario::class, 'id');
    }

    public function departamentos()
    {
        return $this->belongsToMany(DepartamentoAcademico::class, 'docente_x_departamento', 'docente_id', 'departamento_id');
    }
}
