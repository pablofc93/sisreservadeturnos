<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = ['dia','hora_inicio','hora_fin','doctor_id','consultorio_id'];

    //relaciones
    //muchos horarios pueden ser asignados a un doctor
    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

    
    public function consultorio(){
        return $this->belongsTo(Consultorio::class);
    }
}
