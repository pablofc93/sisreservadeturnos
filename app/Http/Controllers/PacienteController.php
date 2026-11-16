<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::all();
        return view('admin.pacientes.index',compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'nombres' => 'required',
            'apellido' => 'required',
            'dni' => 'required|unique:pacientes',
            'nro_seguro' => 'required|unique:pacientes',
            'fecha_nacimiento' => 'required',
            'genero' => 'required',
            'celular' => 'required',
            'email' => 'required|max:250|unique:pacientes',
            'direccion' => 'required',
            'grupo_sanguineo' => 'required',
            'alergias' => 'required',
            'contacto_emergencia' => 'required',
        ]);

        $paciente = new Paciente();
        $paciente->nombres = $request->nombres;
        $paciente->apellido  = $request->apellido;
        $paciente->dni = $request->dni;
        $paciente->nro_seguro = $request->nro_seguro;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->genero = $request->genero;
        $paciente->celular = $request->celular;
        $paciente->email = $request->email;
        $paciente->direccion = $request->direccion;
        $paciente->grupo_sanguineo = $request->grupo_sanguineo;
        $paciente->alergias = $request->alergias;
        $paciente->contacto_emergencia = $request->contacto_emergencia;
        $paciente->observaciones = $request->observaciones;

        $paciente->save();

        return redirect()->route('admin.pacientes.index')
            ->with('mensaje','paciente registrado con éxito')
            ->with('icono','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('admin.pacientes.show',compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('admin.pacientes.edit',compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $paciente = Paciente::find($id);

        $request->validate([
            'nombres' => 'required',
            'apellido' => 'required',
            'dni' => 'required|unique:pacientes,dni,'.$paciente->id,
            'nro_seguro' => 'required|unique:pacientes,nro_seguro,'.$paciente->id,
            'fecha_nacimiento' => 'required',
            'genero' => 'required',
            'celular' => 'required',
            'email' => 'required|max:250|unique:pacientes,email,'.$paciente->id,
            'direccion' => 'required',
            'grupo_sanguineo' => 'required',
            'alergias' => 'required',
            'contacto_emergencia' => 'required',
        ]);

        $paciente->nombres = $request->nombres;
        $paciente->apellido  = $request->apellido;
        $paciente->dni = $request->dni;
        $paciente->nro_seguro = $request->nro_seguro;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->genero = $request->genero;
        $paciente->celular = $request->celular;
        $paciente->email = $request->email;
        $paciente->direccion = $request->direccion;
        $paciente->grupo_sanguineo = $request->grupo_sanguineo;
        $paciente->alergias = $request->alergias;
        $paciente->contacto_emergencia = $request->contacto_emergencia;
        $paciente->observaciones = $request->observaciones;

        $paciente->save();

        return redirect()->route('admin.pacientes.index')
            ->with('mensaje','paciente actualizado con éxito')
            ->with('icono','success');
    }
    
    public function confirmDelete($id){
        $paciente = Paciente::findOrFail($id);
        return view('admin.pacientes.delete',compact('paciente'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Paciente::destroy($id);
        return redirect()->route('admin.pacientes.index')
            ->with('mensaje','paciente eliminado con éxito')
            ->with('icono','success');
    }
}
