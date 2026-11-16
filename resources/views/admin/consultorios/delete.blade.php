@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Consultorio: {{$consultorio->nombre}}</h1>
</div>

<hr>
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-danger">
            <div class="card-header">
                <h3 class="card-title">¿Está seguro de eliminar este registro?</h3>
            </div>
            <!--cuerpo del formulario-->
            <div class="card-body">
                <form action="{{url('/admin/consultorios',$consultorio->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="row">

                        <!--campo nombre-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Nombre del consultorio</label>
                                <p>{{$consultorio->nombre}}</p>
                            </div>
                        </div>

                        <!--campo ubicación-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Ubicación</label>
                                <p>{{$consultorio->ubicacion}}</p>
                            </div>
                        </div>

                        <!--campo capacidad-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Capacidad</label>
                                <p>{{$consultorio->capacidad}}</p>
                            </div>
                        </div>

                        <!--campo teléfono-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Teléfono</label>
                                <p>{{$consultorio->telefono}}</p>

                            </div>
                        </div>

                    </div>
                    <br>


                    <div class="row">

                        <!--campo especialidad-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Especialidad</label>
                                <p>{{$consultorio->especialidad}}</p>
                            </div>
                        </div>

                        <!--campo estado-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Estado</label>
                                <p>{{$consultorio->estado}}</p>
                            </div>
                        </div>



                    </div>
                    <hr>

                    <!--botón de verificación-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('admin/consultorios')}}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-danger">Eliminar consultorio</button>
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