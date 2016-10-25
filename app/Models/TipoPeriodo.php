<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoPeriodo extends Model
{
    protected $table = 'tipo_periodo';

    protected $fillable = [
        'nombre',
    ];

    public $timestamps = false;

    public function periodos()
    {
        return $this->hasMany(Periodo::class, 'tipo_id');
    }
}
