<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\storage;

class ConfiguracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configuracion = Configuracion::all();
        return view('admin.configuracion.index',compact('configuracion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.configuracion.create');
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

        //validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
            'logo' => 'required',
        ]);

        //crear el registro
        $configuracion = new Configuracion();

        $configuracion->nombre = $request->nombre;
        $configuracion->direccion = $request->direccion;
        $configuracion->telefono = $request->telefono;
        $configuracion->correo = $request->correo;
        $configuracion->logo = $request->file('logo')->store('logos','public'); //trabajo para que se guarde el logo

        $configuracion->save();

        return redirect()->route('admin.configuracion.index')
            ->with('mensaje','configuración registrada con éxito')
            ->with('icono','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Configuracion  $configuracion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $configuracion = Configuracion::find($id);
        return view('admin.configuracion.show',compact('configuracion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Configuracion  $configuracion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $configuracion = Configuracion::find($id);
        return view('admin.configuracion.edit',compact('configuracion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Configuracion  $configuracion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        //dd($request->all(), $request->file('logo'));

        //validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
        ]);

        //crear el registro
        $configuracion = Configuracion::find($id);

        $configuracion->nombre = $request->nombre;
        $configuracion->direccion = $request->direccion;
        $configuracion->telefono = $request->telefono;
        $configuracion->correo = $request->correo;

        if($request->hasFile('logo')){
            Storage::delete('public/'.$configuracion->logo);
            $configuracion->logo = $request->file('logo')->store('logos','public'); //trabajo para que se guarde el logo
        }
        

        $configuracion->save();

        return redirect()->route('admin.configuracion.index')
            ->with('mensaje','configuración registrada con éxito')
            ->with('icono','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Configuracion  $configuracion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $configuracion =  Configuracion::find($id);
        Storage::delete('public/' . $configuracion->logo);
        Configuracion::destroy($id);

        return redirect()->route('admin.configuracion.index')
            ->with('mensaje', 'configuración eliminada con éxito')
            ->with('icono', 'success');
    }

    public function confirmDelete($id){
        $configuracion = Configuracion::find($id);
        return view('admin.configuracion.delete',compact('configuracion'));
    }
}
