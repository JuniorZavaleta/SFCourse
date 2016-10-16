<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, HasApiTokens;

    protected $table = 'usuario';

    protected $fillable = [
        'id',
        'nombres',
        'apellidos',
        'email',
        'password',
        'tipo_usuario_id',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $dates = ['deleted_at'];

    public $timestamps = false;

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function docente()
    {
        return $this->hasOne(Docente::class, 'id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function user_type()
    {
        return $this->belongsTo(UserType::class);
    }

    public function ips_lista_blanca()
    {
        return $this->hasMany(Firewall::class, 'usuario_id')->listaBlanca();
    }

    public function scopeWhereAdmin($query)
    {
        return $query->where('tipo_usuario_id', 1);
    }

    public function getNombreCompletoAttribute()
    {
        return ucfirst($this->nombres) . " " . ucfirst($this->apellidos);
    }

    public function getEsAdminAttribute()
    {
        return $this->tipo_usuario_id == 1;
    }

    public function getEsDocenteAttribute()
    {
        return $this->tipo_usuario_id == 3;
    }
}
