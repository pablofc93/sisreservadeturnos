@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Doctor: {{$doctor->nombres." ".$doctor->apellido}}</h1>
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
                <form action="{{url('/admin/doctores',$doctor->id)}}" method="POST">
                    @csrf
                    @method('DELETE')

                    <div class="row">
                        <!--campo nombre-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Nombres</label>
                                <p>{{$doctor->nombres}}</p>
                            </div>
                        </div>

                        <!--campo apellido-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Apellido</label>
                                <p>{{$doctor->apellido}}</p>
                            </div>
                        </div>

                        <!--campo teléfono-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Teléfono</label>
                                <p>{{$doctor->celular}}</p>
                            </div>
                        </div>

                        <!--licencia médica -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Licencia Médica</label>
                                <p>{{$doctor->licencia_medica}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <!--especialidad-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Especialidad</label>
                                <p>{{$doctor->especialidad}}</p>
                            </div>
                        </div>

                        <!--campo email-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Email</label>
                                <p>{{$doctor->user->email}}</p>
                            </div>
                        </div>

                    </div>
                    <br>

                    <hr>

                    <!--botón de verificación-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('admin/doctores')}}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-danger">Eliminar registro</button>
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
            </div>
        </div>
    </div>
</div>
@endsection