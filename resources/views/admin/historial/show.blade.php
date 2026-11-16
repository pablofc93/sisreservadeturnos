@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Paciente: {{$historial->paciente->apellido." ".$historial->paciente->nombres}}</h1>
</div>

<hr>
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Complete los campos</h3>
            </div>
            <!--cuerpo del formulario-->
            <div class="card-body">

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
                                <a href="{{url('admin/historial')}}" class="btn btn-secondary">Volver</a>
                            </div>
                        </div>
                    </div>
                    <hr>
            </div>
        </div>
    </div>
</div>
@endsection