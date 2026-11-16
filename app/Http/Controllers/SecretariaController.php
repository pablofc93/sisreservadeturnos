<?php

namespace App\Http\Controllers;

use App\Models\Secretaria;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Facades\Hash;

class SecretariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $secretarias = Secretaria::with('user')->get();
        return view('admin.secretarias.index',compact('secretarias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.secretarias.create');
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
            'dni' => 'required|unique:secretarias',
            'celular' => 'required',
            'fecha_nacimiento' => 'required',
            'direccion' => 'required',
            'email' => 'required|max:250|unique:users',
            'password' => 'required|max:250|confirmed',
        ]);

        //se almacenan en la bd los datos capturados para user
        $usuario = new User();
        $usuario->name = $request->nombres;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request['password']);
        $usuario->save();

        //se almacenan en la bd los datos capturados para secretaria
        $secretaria = new Secretaria();
        $secretaria->user_id = $usuario->id;
        $secretaria->nombres = $request->nombres;
        $secretaria->apellido = $request->apellido;
        $secretaria->dni = $request->dni;
        $secretaria->celular = $request->celular;
        $secretaria->fecha_nacimiento = $request->fecha_nacimiento;
        $secretaria->direccion = $request->direccion;
        $secretaria->save();

        //luego de crear el usuario, asignar el rol
        $usuario->assignRole('secretaria');

        return redirect()->route('admin.secretarias.index')
            ->with('mensaje','secretaria registrada con éxito')
            ->with('icono','success');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Secretaria  $secretaria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $secretaria = Secretaria::with('user')->findOrFail($id);
        return view('admin.secretarias.show', compact('secretaria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Secretaria  $secretaria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $secretaria = Secretaria::with('user')->findOrFail($id);
        return view('admin.secretarias.edit', compact('secretaria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Secretaria  $secretaria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $secretaria = Secretaria::find($id);

        //$usuario = User::find($id);
        $request->validate([
            'nombres' => 'required',
            'apellido' => 'required',
            'dni' => 'required|unique:secretarias,dni,' . $secretaria->id,
            'celular' => 'required',
            'fecha_nacimiento' => 'required',
            'direccion' => 'required',
            'email' => 'required|max:250|unique:users,email,'.$secretaria->user->id,
            'password' => 'nullable|max:250|confirmed',
        ]);

        //$secretaria = new Secretaria();
        $secretaria->nombres = $request->nombres;
        $secretaria->apellido = $request->apellido;
        $secretaria->dni = $request->dni;
        $secretaria->celular = $request->celular;
        $secretaria->fecha_nacimiento = $request->fecha_nacimiento;
        $secretaria->direccion = $request->direccion;
        $secretaria->save();

        $usuario = User::find($secretaria->user->id);
        $usuario->name = $request->nombres;
        $usuario->email = $request->email;
        if($request->filled('password')){
            $usuario->password = Hash::make($request['password']);
        }
        $usuario->save();

        return redirect()->route('admin.secretarias.index')
            ->with('mensaje','Datos actualizados correctamente')
            ->with('icono','success');

    }

    public function confirmDelete($id){
        $secretaria = Secretaria::with('user')->findOrFail($id);
        return view('admin.secretarias.delete', compact('secretaria'));
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Secretaria  $secretaria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        
        $secretaria = Secretaria::find($id);

        //eliminar al usuario asociado
        $user = $secretaria->user;
        $user->delete();

        //eliminar a la secretaria
        $secretaria->delete();

        return redirect()->route('admin.secretarias.index')
            ->with('mensaje','Datos eliminados correctamente')
            ->with('icono','success');

    }
}
