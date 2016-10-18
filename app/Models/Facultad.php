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

    protected $appends = [
        'institucion_siglas'
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

    public function academicPeriods()
    {
        return $this->hasMany(AcademicPeriod::class);
    }

    public function scopeTodas($query)
    {
        $institucion_id = request()->input('institucion');
        if ($institucion_id)
            return $query->where('institucion_id', $institucion_id);
        return $query;
    }
}
