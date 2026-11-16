@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Actualización de datos del consultorio: {{$consultorio->nombre}}</h1>
</div>

<hr>
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">Complete los campos</h3>
            </div>
            <!--cuerpo del formulario-->
            <div class="card-body">

                <form action="{{url('/admin/consultorios',$consultorio->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">

                        <!--campo nombre-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Nombre del consultorio</label><b>*</b>
                                <input type="text" value="{{$consultorio->nombre}}" name="nombre" class="form-control" required>
                                @error('nombre')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!--campo ubicación-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Ubicación</label><b>*</b>
                                <input type="text" value="{{$consultorio->ubicacion}}" name="ubicacion" class="form-control" required>
                                @error('ubicacion')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!--campo capacidad-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Capacidad</label><b>*</b>
                                <input type="text" value="{{$consultorio->capacidad}}" name="capacidad" class="form-control" required>
                                @error('capacidad')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!--campo teléfono-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Teléfono</label>
                                <input type="text" value="{{$consultorio->telefono}}" name="telefono" class="form-control">

                            </div>
                        </div>

                    </div>
                    <br>

                    
                    <div class="row">

                        <!--campo especialidad-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Especialidad</label><b>*</b>
                                <input type="text" value="{{$consultorio->especialidad}}" name="especialidad" class="form-control" required>
                                @error('especialidad')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!--campo estado-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Estado</label>
                                <select name="estado" id="" class="form-control">
                                    @if($consultorio->estado=='ACTIVO')
                                        <option value="ACTIVO">ACTIVO</option>
                                        <option value="INACTIVO">INACTIVO</option>
                                    @else
                                        <option value="INACTIVO">INACTIVO</option>
                                        <option value="ACTIVO">ACTIVO</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                       

                    </div>
                    <hr>

                    <!--botón de verificación-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('admin/consultorios')}}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-success">Actualizar consultorio</button>
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