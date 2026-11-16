@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Usuario:{{$usuario->name}}</h1>
</div>

<hr>
<div class="row">
    <div class="col-md-6">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">¿Está seguro de eliminar este registro?</h3>
            </div>
            <!--cuerpo del formulario-->
            <div class="card-body">

                <form action="{{url('/admin/usuarios',$usuario->id)}}" method="POST">
                    @csrf <!--token de seguridad-->
                    @method('DELETE')

                    <!--campo nombre-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Nombre de usuario</label>
                                <input type="text" value="{{$usuario->name}}" name="name" class="form-control" disabled>
                                @error('name')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>

                    <!--campo email-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Correo electrónico</label>
                                <input type="email" value="{{$usuario->email}}" name="email" class="form-control" disabled>
                                @error('email')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>

                    <!--botón de verificación-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('admin/usuarios')}}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-danger">Eliminar usuario</button>
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