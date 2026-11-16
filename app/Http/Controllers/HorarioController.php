<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Horario;
use Illuminate\Http\Request;


class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $consultorios = Consultorio::all();
        
        //horarios está relacionada con doctores y consultorios
        $horarios = Horario::with('doctor','consultorio')->get();
        return view('admin.horarios.index',compact('horarios','consultorios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctores = Doctor::all();
        $consultorios = Consultorio::all();
        $horarios = Horario::with('doctor','consultorio')->get();
        return view('admin.horarios.create',compact('doctores','consultorios','horarios'));
    }

    public function cargar_datos_consultorios($id){
        try{
            $horarios = Horario::with('doctor','consultorio')->where('consultorio_id',$id)->get();
            //print_r($horarios);
            return  view('admin.horarios.cargar_datos_consultorios',compact('horarios'));
        }catch(\Exception $exception){
            return response()->json(['mensaje' => 'Error']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //$datos = request()->all();
        //return response()->json($datos);

        //validar los datos del formulario
        $request->validate([
            'dia' => 'required',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'consultorio_id' => 'required|exists:consultorios,id', //validar que el consultorio exista
        ]);

        //verificar si el horario ya existe para ese día, rango de horas y consultorio
        $horarioExistente = Horario::where('dia', $request->dia)
            ->where('consultorio_id', $request->consultorio_id) //filtrar por consultorios
            ->where(function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('hora_inicio', '>=', $request->hora_inicio)
                        ->where('hora_inicio', '<', $request->hora_fin);
                })
                    ->orWhere(function ($query) use ($request) {
                        $query->where('hora_fin', '>', $request->hora_inicio)
                        ->where('hora_fin', '<=', $request->hora_fin);
                    })
                    ->orWhere(function ($query) use ($request) {
                        $query->where('hora_inicio', '<', $request->hora_inicio)
                            ->where('hora_fin', '>', $request->hora_fin);
                    });
            })
            ->exists();

        if($horarioExistente){
            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'Ya existe un horario que se superpone con el horario ingresado para el consultorio')
                ->with('icono', 'error');
        }

        Horario::create($request->all());

        return redirect()->route('admin.horarios.index')
            ->with('mensaje','horario asignado con éxito')
            ->with('icono','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //horarios está relacionada con doctores y consultorios
        $horario = Horario::find($id);
        return view('admin.horarios.show',compact('horario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */

    public function edit($id){
        $horario = Horario::with('doctor', 'consultorio')->findOrFail($id); // Carga el horario con doctor y consultorio relacionados
        $doctores = Doctor::all(); // Para el select
        $consultorios = Consultorio::all(); // Para el select

        return view('admin.horarios.edit', compact('horario', 'doctores', 'consultorios'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */

    /* public function update(Request $request, $id){
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'consultorio_id' => 'required|exists:consultorios,id',
            'dia' => 'required|in:LUNES,MARTES,MIÉRCOLES,JUEVES,VIERNES,SÁBADO,DOMINGO',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
        ]);

        $horario = Horario::findOrFail($id);

        // Actualizar datos del horario
        $horario->doctor_id = $request->doctor_id;
        $horario->consultorio_id = $request->consultorio_id;
        $horario->dia = $request->dia;
        $horario->hora_inicio = $request->hora_inicio;
        $horario->hora_fin = $request->hora_fin;

        $horario->save();

        return redirect()->route('admin.horarios.index')
            ->with('mensaje', 'Horario modificado correctamente.')
            ->with('icono', 'success');
    } */

    public function update(Request $request, $id){
        // 1. Buscar el horario actual
        $horario = Horario::find($id);

        if (!$horario) {
            return redirect()->back()->with('error', 'Horario no asignado, no se puede modificar.');
        }

        // 2. Validar datos del formulario
        $request->validate([
            'consultorio_id' => 'required|exists:consultorios,id',
            'doctor_id' => 'required|exists:doctors,id',
            'dia' => 'required|string',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
        ]);

        // 3. Verificar si existe un horario con ese ID y que incluya ese día y franja horaria
        $existe = Horario::where('id', $id)
            ->where('dia', strtoupper($request->dia))
            ->where('hora_inicio', '<=', $request->hora_inicio)
            ->where('hora_fin', '>=', $request->hora_fin)
            ->exists();

        if (!$existe) {
            return redirect()->back()->with('error', 'No es posible editar este horario porque no está asignado.');
        }

        // 4. Si todo es válido, actualizar
        $horario->consultorio_id = $request->consultorio_id;
        $horario->doctor_id = $request->doctor_id;
        $horario->dia = strtoupper($request->dia);
        $horario->hora_inicio = $request->hora_inicio;
        $horario->hora_fin = $request->hora_fin;
        $horario->save();

        return redirect()->route('admin.horarios.index')
            ->with('mensaje', 'Horario modificado con éxito')
            ->with('icono', 'success');
    }





    public function confirmDelete($id){
        $horario = Horario::findOrFail($id);
        return view('admin.horarios.delete',compact('horario'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        // Buscar el horario asignado
        $horario = Horario::find($id);

        // Validar que el horario exista
        if (!$horario) {
            return redirect()->back()->with('error', 'El horario no existe o ya fue eliminado.');
        }

        // Eliminar el horario
        $horario->delete();

        return redirect()->route('admin.horarios.index')
            ->with('mensaje', 'Horario eliminado correctamente.')
            ->with('icono', 'success');
    }

}
