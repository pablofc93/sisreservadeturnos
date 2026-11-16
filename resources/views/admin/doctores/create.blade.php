@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Registro de un nuevo doctor</h1>
</div>

<hr>
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Complete los campos</h3>
            </div>
            <!--cuerpo del formulario-->
            <div class="card-body">

                <form action="{{url('/admin/doctores/create')}}" method="POST">
                    @csrf

                    <div class="row">
                        <!--campo nombre-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Nombres</label><b>*</b>
                                <input type="text" value="{{ old('nombres') }}" name="nombres" class="form-control" required>
                                @error('nombres')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!--campo apellido-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Apellido</label><b>*</b>
                                <input type="text" value="{{ old('apellido') }}" name="apellido" class="form-control" required>
                                @error('apellido')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!--campo teléfono-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Teléfono</label><b>*</b>
                                <input type="text" value="{{ old('celular') }}" name="celular" class="form-control" required>
                                @error('celular')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!--licencia médica -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Licencia Médica</label><b>*</b>
                                <input type="text" value="{{ old('licencia_medica') }}" name="licencia_medica" class="form-control" required>
                                @error('licencia_medica')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <!--especialidad-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Especialidad</label><b>*</b>
                                <input type="text" value="{{ old('especialidad') }}" name="especialidad" class="form-control" required>
                                @error('especialidad')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!--campo email-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Email</label><b>*</b>
                                <input type="email" value="{{ old('email') }}" name="email" class="form-control" required>
                                @error('email')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!--campo contraseña-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Contraseña</label><b>*</b>
                                <input type="password" value="{{ old('password') }}" name="password" class="form-control" required>
                                @error('password')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!--campo repetir contra-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Repetir contraseña</label><b>*</b>
                                <input type="password" name="password_confirmation" class="form-control" required>
                                @error('password_confirmation')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
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
                                <button type="submit" class="btn btn-primary">Registrar doctor</button>
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