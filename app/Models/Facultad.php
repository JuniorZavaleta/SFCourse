<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    protected $table = 'facultad';

    protected $fillable = [
        'nombre',
        'codigo',
        'institucion_id',
    ];

    protected $hidden = [
        'institucion'
    ];

    public $timestamps = false;

    public function institucion()
    {
        return $this->belongsTo(Institucion::class);
    }

    public function getInstitucionSiglasAttribute()
    {
        return $this->institucion->siglas;
    }

    public function escuelas()
    {
        return $this->hasMany(Escuela::class,'facultad_id');
    }

    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }

    public function periodos()
    {
        return $this->hasMany(Periodo::class, 'facultad_id');
    }

    public function departamentosAcademicos()
    {
        return $this->hasMany(DepartamentoAcademico::class, 'facultad_id');
    }

    public function scopeTodas($query)
    {
        $institucion_id = request()->input('institucion');
        if ($institucion_id)
            return $query->where('institucion_id', $institucion_id);
        return $query;
    }
}
