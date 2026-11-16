<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use App\Models\Doctor;
use App\Models\Historial;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Psy\bin;

class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historiales = Historial::with('paciente', 'doctor')->get();
        return view('admin.historial.index', compact('historiales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pacientes = Paciente::orderBy('apellido','asc')->get();
        return view('admin.historial.create', compact('pacientes'));
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
        $historial = new Historial();
        $historial->detalle = $request->detalle;
        $historial->fecha_visita = $request->fecha_visita;
        $historial->paciente_id = $request->paciente_id;
        $historial->doctor_id = Auth::user()->doctor->id;

        $historial->save();

        return redirect()->route('admin.historial.index')
        ->with('mensaje', 'Historial médico registrado correctamente')
        ->with('icono', 'success');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Historial  $historial
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $historial = Historial::find($id);
        return view('admin.historial.show', compact('historial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Historial  $historial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $historial = Historial::find($id);
        $pacientes = Paciente::orderBy('apellido','asc')->get();
        return view('admin.historial.edit', compact('historial', 'pacientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Historial  $historial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$datos = request()->all();
        //return response()->json($datos);

        $historial = Historial::find($id);

        $historial->detalle = $request->detalle;
        $historial->fecha_visita = $request->fecha_visita;
        $historial->paciente_id = $request->paciente_id;
        $historial->doctor_id = Auth::user()->doctor->id;

        $historial->save();

        return redirect()->route('admin.historial.index')
        ->with('mensaje', 'Historial médico actualizado correctamente')
        ->with('icono', 'success');
    }

    public function confirmDelete($id){
        $historial = Historial::find($id);
        return view('admin.historial.delete',compact('historial'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Historial  $historial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $historial = Historial::find($id);

        $historial->delete();

        return redirect()->route('admin.historial.index')
            ->with('mensaje','Historial clínico eliminado correctamente')
            ->with('icono','success');
    }

    public function pdf($id){
        $configuracion = Configuracion::latest()->first();
        $historial = Historial::find($id);

        $pdf = \PDF::loadView('admin.historial.pdf', compact('configuracion', 'historial'));

        // Incluir la numeración de páginas y el pie de página
        $pdf->output();
        $dompdf = $pdf->getDomPDF();
        $canvas = $dompdf->getCanvas();
        $canvas->page_text(20, 800, "Impreso por: " . Auth::user()->email, null, 10, array(0, 0, 0));
        $canvas->page_text(270, 800, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));
        $canvas->page_text(450, 800, "Fecha: " . \Carbon\Carbon::now()->format('d/m/Y') . " - " . \Carbon\Carbon::now()->format('H:i:s'), null, 10, array(0, 0, 0));


        return $pdf->stream();
    }

    public function buscar_paciente(Request $request){
        $dni = $request->dni;
        $paciente = Paciente::where('dni', $dni)->first();
        return view('admin.historial.buscar_paciente', compact('paciente'));
    }

    public function imprimir_historial($id){
        $configuracion = Configuracion::latest()->first();
        $paciente = Paciente::find($id);

        $historiales = Historial::where('paciente_id', $id)->get();

        $pdf = \PDF::loadView('admin.historial.imprimir_historial', compact('configuracion', 'historiales', 'paciente'));

        // Incluir la numeración de páginas y el pie de página
        $pdf->output();
        $dompdf = $pdf->getDomPDF();
        $canvas = $dompdf->getCanvas();
        $canvas->page_text(20, 800, "Impreso por: " . Auth::user()->email, null, 10, array(0, 0, 0));
        $canvas->page_text(270, 800, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));
        $canvas->page_text(450, 800, "Fecha: " . \Carbon\Carbon::now()->format('d/m/Y') . " - " . \Carbon\Carbon::now()->format('H:i:s'), null, 10, array(0, 0, 0));


        return $pdf->stream();
    }
}
