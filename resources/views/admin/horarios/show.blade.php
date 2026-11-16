@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Datos del horario</h1>
</div>

<hr>
<div class="row">
    <div class="col-md-10">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Información sobre el horario asignado</h3>
            </div>
            <!--cuerpo del formulario-->
            <div class="card-body">

                    <div class="row">

                        <!--doctores -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Doctores</label>
                                <p>{{$horario->doctor->nombres." ".$horario->doctor->apellido." - ".$horario->doctor->especialidad}}</p>
                            </div>
                        </div>

                        <!--consultorios -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Consultorios</label>
                                <p>{{$horario->consultorio->nombre." - ".$horario->consultorio->ubicacion}}</p>
                                
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <!--campo día-->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Día</label>
                                <p>{{$horario->dia}}</p>
                            </div>
                        </div>

                        <!--campo hora-inicio-->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Hora de inicio</label>
                                <p>{{$horario->hora_inicio}}</p>
                            </div>
                        </div>

                        <!--campo hora-final-->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Hora de finalización</label>
                                <p>{{$horario->hora_fin}}</p>
                            </div>
                        </div>


                    </div>
                    <br>

                    <hr>

                    <!--botón de verificación-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('admin/horarios')}}" class="btn btn-secondary">Volver</a>
                            </div>
                        </div>
                    </div>
                    <hr>

            </div>
        </div>
    </div>
</div>
@endsection