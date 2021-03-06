<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $table = 'classes';

    protected $fillable = ['classroom_id', 'group_id', 'professor_id', 'start_hour', 'end_hour', 'day', 'type'];

    public $timestamps = false;

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function classroom()
    {
        return $this->belongsTo(ClassRoom::class);
    }

    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }

    public function sessions()
    {
        return $this->hasMany(SessionClass::class);
    }

    public function attendances()
    {
        return $this->hasManyThrough(Attendance::class, SessionClass::class, 'class_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
