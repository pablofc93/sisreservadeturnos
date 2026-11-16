<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use Illuminate\Http\Request;

class ConsultorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultorios = Consultorio::all();
        return view('admin.consultorios.index',compact('consultorios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.consultorios.create');
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
            'nombre' => 'required',
            'ubicacion' => 'required',
            'capacidad' => 'required',
            'especialidad' => 'required',
            'estado' => 'required',
        ]);

        Consultorio::create($request->all());

        return redirect()->route('admin.consultorios.index')
            ->with('mensaje','Consultorio registrado con éxito')
            ->with('icono','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consultorio  $consultorio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consultorio = Consultorio::findOrFail($id);
        return view('admin.consultorios.show',compact('consultorio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consultorio  $consultorio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consultorio = Consultorio::findOrFail($id);
        return view('admin.consultorios.edit',compact('consultorio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consultorio  $consultorio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validación
        $request->validate([
            'nombre' => 'required',
            'ubicacion' => 'required',
            'capacidad' => 'required',
            'especialidad' => 'required',
            'estado' => 'required',
        ]);

        //búsqueda
        $consultorio = Consultorio::find($id);
        $consultorio->update($request->all());

        return redirect()->route('admin.consultorios.index')
            ->with('mensaje','Consultorio actualizado con éxito')
            ->with('icono','success');
    }

    public function confirmDelete($id){
        $consultorio = Consultorio::findOrFail($id);
        return view('admin.consultorios.delete',compact('consultorio'));
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consultorio  $consultorio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        
        $consultorio = Consultorio::find($id);
        $consultorio->delete();
        
        return redirect()->route('admin.consultorios.index')
            ->with('mensaje','Consultorio eliminado con éxito')
            ->with('icono','success');
    }
}
