@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Secretaria: {{$secretaria->nombres}} {{$secretaria->apellido}}</h1>
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
                                <label for="">Nombres</label>
                                <p>{{$secretaria->nombres}}</p>
                            </div>
                        </div>

                        <!--campo apellido-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Apellido</label>
                                <p>{{$secretaria->apellido}}</p>
                            </div>
                        </div>

                        <!--campo dni-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">DNI</label>
                                <p>{{$secretaria->dni}}</p>
                            </div>
                        </div>

                        <!--campo celular-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Celular</label>
                                <p>{{$secretaria->celular}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <!--campo fecha de nacimiento-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Fecha de nacimiento</label>
                                <p>{{$secretaria->fecha_nacimiento}}</p>
                            </div>
                        </div>

                        <!--campo dirección-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Dirección</label>
                                <p>{{$secretaria->direccion}}</p>
                            </div>
                        </div>

                        <!--campo email-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Email</label>
                                <p>{{$secretaria->user->email}}</p>
                            </div>
                        </div> 

                    </div>
                    <br>

                    <hr>

                    <!--botón de verificación-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('admin/secretarias')}}" class="btn btn-secondary">Volver</a>
                            </div>
                        </div>
                    </div>
                    <hr>

            </div>
        </div>
    </div>
</div>
@endsection