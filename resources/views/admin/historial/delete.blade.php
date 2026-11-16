@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Paciente: {{$historial->paciente->apellido." ".$historial->paciente->nombres}}</h1>
</div>

<hr>
<div class="row">
    <div class="col-md-12">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">¿Está seguro de eliminar este registro?</h3>
            </div>
            <!--cuerpo del formulario-->
            <div class="card-body">
                <form action="{{url('/admin/historial',$historial->id)}}" method="POST">
                    @csrf
                    @method('DELETE')

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">

                                <!--campo nombre del paciente-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Paciente</label>
                                        <p>{{$historial->paciente->apellido." ".$historial->paciente->nombres}}</p>
                                    </div>
                                </div>

                                <!--campo fecha-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Fecha del turno médico</label>
                                        <p>{{$historial->fecha_visita}}</p>
                                    </div>
                                </div>

                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <!--descripcion del turno médico-->
                                        <label for="">Detalle del turno</label>
                                        <p>{!!$historial->detalle!!}</p>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <hr>

                    <!--botón de verificación-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('admin/historial')}}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </div>
                        </div>
                    </div>
                    <hr>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection