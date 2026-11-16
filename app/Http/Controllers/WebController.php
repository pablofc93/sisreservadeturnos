<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\Event;
use App\Models\Horario;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function index(){
       /* try{
            $horarios = Horario::with('doctor','consultorio')->where('consultorio_id',$id)->get();
            //print_r($horarios);
            return  view('admin.horarios.cargar_datos_consultorios',compact('horarios'));
        }catch(\Exception $exception){
            return response()->json(['mensaje' => 'Error']);
        }*/
        $consultorios = Consultorio::all();
        return view('index',compact('consultorios'));
    }

    /* public function cargar_datos_consultorios($id){
        $consultorio = Consultorio::find($id);

        try{
            $horarios = Horario::with('doctor','consultorio')->where('consultorio_id',$id)->get();
            //print_r($horarios);
            return  view('cargar_datos_consultorios',compact('horarios','consultorio'));
        }catch(\Exception $exception){
            return response()->json(['mensaje' => 'Error']);
        }
    } */

    //prueba para ver si anda bien
    public function cargar_datos_consultorios($id)
    {
        try {
            $horarios = Horario::with('doctor', 'consultorio')
                ->where('consultorio_id', $id)
                ->get();
            $consultorio = Consultorio::findOrFail($id);
            return view('cargar_datos_consultorios', compact('horarios', 'consultorio'));
        } catch (\Exception $e) {
            return response()->json(['mensaje' => 'Error al obtener datos del consultorio'], 500);
        }
    }

    /*en el select se colocan todos los parámetros necesarios para que los datos se pinten en color rojo
    y salgan en el formato indicado*/
    public function cargar_reserva_doctores($id){
        //echo $id;
         try{
            $eventos = Event::where('doctor_id',$id)
                ->select('id','title', DB::raw('DATE_FORMAT(start, "%Y-%m-%d") as start'), DB::raw('DATE_FORMAT(end, "%Y-%m-%d") as end'), 'color')
                ->get();
            //print_r($horarios);
            return  response()->json($eventos);
        }catch(\Exception $exception){
            return response()->json(['mensaje' => 'Error']);
        }
    }
}
