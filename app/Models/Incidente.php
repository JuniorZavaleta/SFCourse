<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

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

    public function scopeRecientes($query)
    {
        $query->where('created_at', '>=', Carbon::today()->subDays(3))
              ->orderBy('created_at', 'DESC');
    }

    public function scopeDelPais($query)
    {
        $query->where('pais_nombre');
    }

}
