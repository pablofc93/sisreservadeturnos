<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use App\Models\Doctor;
use App\Models\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctores = Doctor::all(); // sin relaciones
        return view('admin.doctores.index', compact('doctores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.doctores.create');
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
            'celular' => 'required',
            'licencia_medica' => 'required',
            'especialidad' => 'required',
            'email' => 'required|max:250|unique:users',
            'password' => 'required|max:250|confirmed',
        ]);

        //se almacenan en la bd los datos capturados para user
        $usuario = new User();
        $usuario->name = $request->nombres;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request['password']);
        $usuario->save();

        //se almacenan en la bd los datos capturados para doctor
        $doctor = new Doctor();
        $doctor->user_id = $usuario->id;
        $doctor->nombres = $request->nombres;
        $doctor->apellido = $request->apellido;
        $doctor->celular = $request->celular;
        $doctor->licencia_medica = $request->licencia_medica;
        $doctor->especialidad = $request->especialidad;
        $doctor->save();

        //luego de crear el usuario, asignar el rol
        $usuario->assignRole('doctor');

        return redirect()->route('admin.doctores.index')
            ->with('mensaje','doctor registrado con éxito')
            ->with('icono','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctores.show',compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctores.edit',compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $doctor = Doctor::find($id);

        //$usuario = User::find($id);
        $request->validate([
            'nombres' => 'required',
            'apellido' => 'required',
            'celular' => 'required',
            'licencia_medica' => 'required',
            'especialidad' => 'required',
            'email' => 'required|max:250|unique:users,email,'.$doctor->user->id,
            'password' => 'nullable|max:250|confirmed',
        ]);

        //$secretaria = new Secretaria();
        $doctor->nombres = $request->nombres;
        $doctor->apellido = $request->apellido;
        $doctor->celular = $request->celular;
        $doctor->licencia_medica = $request->licencia_medica;
        $doctor->especialidad = $request->especialidad;
        $doctor->save();

        $usuario = User::find($doctor->user->id);
        $usuario->name = $request->nombres;
        $usuario->email = $request->email;
        if($request->filled('password')){
            $usuario->password = Hash::make($request['password']);
        }
        $usuario->save();

        return redirect()->route('admin.doctores.index')
            ->with('mensaje','Datos actualizados correctamente')
            ->with('icono','success');

    }

    public function confirmDelete($id){
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctores.delete',compact('doctor'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $doctor = Doctor::find($id);

        //eliminar al usuario asociado
        $user = $doctor->user;
        $user->delete();

        //eliminar al doctor
        $doctor->delete();

        return redirect()->route('admin.doctores.index')
            ->with('mensaje','Datos eliminados correctamente')
            ->with('icono','success');
    }

    public function informes(){
        return view('admin.doctores.informes');
    }

    public function pdf(){
        $configuracion = Configuracion::latest()->first();
        $doctores = Doctor::all();
        $pdf = \PDF::loadView('admin.doctores.pdf', compact('configuracion', 'doctores'));

        //incluir la numeración de páginas y el pie de página
        $pdf->output();
        $dompdf = $pdf->getDomPDF();
        $canvas = $dompdf->getCanvas();
        $canvas->page_text(20, 800, Auth::user()->email, null, 10, array(0, 0, 0));
        $canvas->page_text(270, 800, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));
        $canvas->page_text(450, 800, "Fecha: " . \Carbon\Carbon::now()->format('d/m/Y')." - ".\Carbon\Carbon::now()->format('H:i'), null, 10, array(0, 0, 0));

        return $pdf->stream();
    }
}
