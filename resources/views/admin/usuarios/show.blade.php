@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Usuario: {{$usuario->name}}</h1>
</div>

<hr>
<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Datos registrados</h3>
            </div>
            <!--cuerpo del formulario-->
            <div class="card-body">

                <!--campo nombre-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Nombre de usuario</label>
                            <p>{{$usuario->name}}</p>
                        </div>
                    </div>
                </div>
                <br>

                <!--campo email-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Correo electrónico</label>
                            <p>{{$usuario->email}}</p>
                        </div>
                    </div>
                </div>
                <br>

                <!--botón de verificación-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="{{url('admin/usuarios')}}" class="btn btn-secondary">Volver</a>
                        </div>
                    </div>
                </div>
                <hr>

            </div>
        </div>
    </div>
</div>
@endsection