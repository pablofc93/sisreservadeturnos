@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Modificar datos de: {{$secretaria->nombres}} {{$secretaria->apellido}}</h1>
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

                <form action="{{url('/admin/secretarias',$secretaria->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!--campo nombre-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Nombres</label>
                                <input type="text" value="{{$secretaria->nombres}}" name="nombres" class="form-control" required>
                                @error('nombres')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!--campo apellido-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Apellido</label>
                                <input type="text" value="{{$secretaria->apellido}}" name="apellido" class="form-control" required>
                                @error('apellido')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!--campo dni-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">DNI</label>
                                <input type="text" value="{{$secretaria->dni}}" name="dni" class="form-control" required>
                                @error('dni')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!--campo celular-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Celular</label>
                                <input type="text" value="{{$secretaria->celular}}" name="celular" class="form-control" required>
                                @error('celular')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <!--campo fecha de nacimiento-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Fecha de nacimiento</label><b>*</b>
                                <input type="date" value="{{$secretaria->fecha_nacimiento}}" name="fecha_nacimiento" class="form-control" required>
                                @error('fecha_nacimiento')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!--campo dirección-->
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="">Dirección</label><b>*</b>
                                <input type="address" value="{{$secretaria->direccion}}" name="direccion" class="form-control" required>
                                @error('direccion')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <br>

                    
                    <div class="row">

                        <!--campo email-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" value="{{$secretaria->user->email}}" name="email" class="form-control" required>
                                @error('email')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!--campo contraseña-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Contraseña</label>
                                <input type="password" value="{{ old('password') }}" name="password" class="form-control">
                                @error('password')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!--campo repetir contra-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Repetir contraseña</label><b>*</b>
                                <input type="password" name="password_confirmation" class="form-control">
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
                                <a href="{{url('admin/secretarias')}}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-success">Actualizar datos</button>
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