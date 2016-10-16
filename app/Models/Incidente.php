<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incidente extends Model
{
    protected $table = 'incidente';

    protected $fillable = [
        'direccion_ip',
        'pais_nombre',
        'pais_code',
        'region_nombre',
        'region_code',
        'ciudad',
        'isp',
        'org',
        'as',
    ];

}