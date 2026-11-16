@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Paciente: {{$paciente->nombres}} {{$paciente->apellido}}</h1>
</div>

<hr>
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Datos registrados</h3>
            </div>
            <!--cuerpo del formulario-->
            <div class="card-body">


                <div class="row">

                    <!--campo nombre-->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <p>{{$paciente->nombres}}</p>
                        </div>
                    </div>

                    <!--campo apellido-->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Apellido</label>
                            <p>{{$paciente->apellido}}</p>
                        </div>
                    </div>

                    <!--campo dni-->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">DNI</label>
                            <p>{{$paciente->dni}}</p>
                        </div>
                    </div>

                    <!--campo nro_seguro-->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Número de seguro</label>
                            <p>{{$paciente->nro_seguro}}</p>
                        </div>
                    </div>

                </div>
                <br>


                <div class="row">

                    <!--campo fecha_nacimiento-->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Fecha de nacimiento</label>
                            <p>{{$paciente->fecha_nacimiento}}</p>
                        </div>
                    </div>

                    <!--campo género-->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Género</label>
                            <p>{{$paciente->genero}}</p>
                        </div>
                    </div>

                    <!--campo celular-->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Celular</label>
                            <p>{{$paciente->celular}}</p>
                        </div>
                    </div>

                    <!--campo email-->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Correo electrónico</label>
                            <p>{{$paciente->email}}</p>
                        </div>
                    </div>

                </div>
                <br>


                <div class="row">

                    <!--campo dirección-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Dirección</label>
                            <p>{{$paciente->direccion}}</p>
                        </div>
                    </div>

                    <!--campo grupo sanguíneo-->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Grupo Sanguíneo</label>
                            <p>{{$paciente->grupo_sanguineo}}</p>
                        </div>
                    </div>

                    <!--campo alergias-->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Alergias</label>
                            <p>{{$paciente->alergias}}</p>
                        </div>
                    </div>

                </div>
                <br>


                <div class="row">

                    <!--campo contacto de emergencia-->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Contacto de emergencia</label>
                            <p>{{$paciente->contacto_emergencia}}</p>
                        </div>
                    </div>

                    <!--campo observaciones-->
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="">Observaciones</label>
                            <p>{{$paciente->observaciones}}</p>
                        </div>
                    </div>

                </div>
                <hr>

                <!--botón de verificación-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="{{url('admin/pacientes')}}" class="btn btn-secondary">Volver</a>
                        </div>
                    </div>
                </div>
                <hr>

            </div>
        </div>
    </div>
</div>
@endsection