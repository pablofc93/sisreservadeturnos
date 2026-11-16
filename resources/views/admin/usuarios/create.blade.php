@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Registro de un nuevo usuario</h1>
</div>

<hr>
<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Complete los campos</h3>
            </div>
            <!--cuerpo del formulario-->
            <div class="card-body">

                <form action="{{url('/admin/usuarios/create')}}" method="POST">
                    @csrf
                    <!--campo nombre-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Nombre de usuario</label><b>*</b>
                                <input type="text" value="{{ old('name') }}" name="name" class="form-control" required>
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
                                <label for="">Correo electrónico</label><b>*</b>
                                <input type="email" value="{{ old('email') }}" name="email" class="form-control" required>
                                @error('email')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>

                    <!--campo contraseña-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Contraseña</label><b>*</b>
                                <input type="password" value="{{ old('password') }}" name="password" class="form-control" required>
                                @error('password')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>

                    <!--campo repetir contraseña-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Repetir contraseña</label><b>*</b>
                                <input type="password" name="password_confirmation" class="form-control" required>
                                @error('password_confirmation')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr>

                    <!--botón de verificación-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('admin/usuarios')}}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Registrar usuario</button>
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