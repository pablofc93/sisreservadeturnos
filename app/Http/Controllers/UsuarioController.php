<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index (){
        $usuarios = User::all();
        return view('admin.usuarios.index', compact('usuarios'));
    }

    //retornar la vista
    public function create(){
        return view ('admin.usuarios.create');
    }

    public function store(Request $request){
        //en esta parte se capturan los datos de registro provenientes del formulario
        //y se realizan las validaciones
        $request->validate([
            'name'=>'required|max:250',
            'email'=>'required|max:250|unique:users',
            'password'=>'required|max:250|confirmed',
        ]);

        //se almacenan en la bd los datos capturados
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request['password']);
        $usuario->save();

        //luego de crear el usuario, asignar el rol
        //$usuario->assignRole('usuario');

        return redirect()->route('admin.usuarios.index')
            ->with('mensaje','usuario registrado con éxito')
            ->with('icono','success');
    }

    public function show($id){
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.show', compact('usuario'));
    }

    //retornar la vista de edición
    public function edit($id){
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.edit', compact('usuario'));
    }

    //se encarga de realizar la actualización de los datos del usuario
    public function update(Request $request, $id){
        $usuario = User::find($id);

        $request->validate([
            'name'=>'required|max:250',
            'email'=>'required|max:250|unique:users,email,'.$usuario->id,
            'password'=>'nullable|max:250|confirmed',
        ]);

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        if($request->filled('password')){
            //editar la contraseña
            $usuario->password = Hash::make($request['password']);
        }
        $usuario->save();

        return redirect()->route('admin.usuarios.index')
            ->with('mensaje','Se actualizó de la manera correcta')
            ->with('icono','success');
    }

    //eliminar un registro de la bd
    public function confirmDelete($id){
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.delete', compact('usuario'));
    }

    public function destroy($id){
        User::destroy($id);
        return redirect()->route('admin.usuarios.index')
            ->with('mensaje','Se eliminó al usuario correctamente')
            ->with('icono','success');
         
    }
}
