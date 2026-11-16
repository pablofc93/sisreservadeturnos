<?php

namespace App\Models;
//namespace App\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Consultorio;
use App\Models\Horario;
use App\Models\User;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = ['nombres','apellido','celular','licencia_medica','especialidad','user_id'];

    //relaciones
    //muchos doctores pueden ocupar un consultorio
    public function consultorio(){
        return $this->belongsTo(Consultorio::class);
    }

    //un doctor puede tener muchos horarios
    public function horarios(){
        return $this->hasMany(Horario::class);
    }

    //un doctor puede un usuario
    public function user(){
        return $this->belongsTo(User::class);
    }

    //un doctor puede tener muchos eventos
    public function events(){
        return $this->hasMany(Event::class);
    }

    public function historial(){
        return $this->hasMany(Historial::class);
    }

    public function pagos(){
        return $this->hasMany(Pago::class);
    }
}
