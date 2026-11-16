<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultorio extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','ubicacion','capacidad','telefono','especialidad','estado'];

    //relaciones
    //un consultorio puede ser ocupado por muchos doctores
    public function doctores(){
        return $this->hasMany(Doctor::class);
    }

    //un consultorio puede tener muchos horarios
    public function horarios(){
        return $this->hasMany(Horario::class);
    }

    //un consultorio puede tener varios eventos
    public function events(){
        return $this->hasMany(Event::class);
    }
}
