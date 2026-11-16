@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Modificar datos del paciente: {{$paciente->nombres." ".$paciente->apellido}}</h1>
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

                <form action="{{url('/admin/pacientes',$paciente->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">

                        <!--campo nombre-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Nombre</label><b>*</b>
                                <input type="text" value="{{$paciente->nombres}}" name="nombres" class="form-control" required>
                                @error('nombres')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!--campo apellido-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Apellido</label><b>*</b>
                                <input type="text" value="{{$paciente->apellido}}" name="apellido" class="form-control" required>
                                @error('apellido')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!--campo dni-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">DNI</label><b>*</b>
                                <input type="text" value="{{$paciente->dni}}" name="dni" class="form-control" required>
                                @error('dni')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!--campo nro_seguro-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Número de seguro</label><b>*</b>
                                <input type="text" value="{{$paciente->nro_seguro}}" name="nro_seguro" class="form-control" required>
                                @error('nro_seguro')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <br>

                    
                    <div class="row">

                        <!--campo fecha_nacimiento-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Fecha de nacimiento</label><b>*</b>
                                <input type="date" value="{{$paciente->fecha_nacimiento}}" name="fecha_nacimiento" class="form-control" required>
                                @error('fecha_nacimiento')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!--campo género-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Género</label>
                                <select name="genero" id="" class="form-control">
                                    @if($paciente->genero=='M')
                                        <option value="M">MASCULINO</option>
                                        <option value="F">FEMENINO</option>
                                    @else
                                        <option value="F">FEMENINO</option>
                                        <option value="M">MASCULINO</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <!--campo celular-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Celular</label><b>*</b>
                                <input type="text" value="{{$paciente->celular}}" name="celular" class="form-control" required>
                                @error('celular')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!--campo email-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Correo electrónico</label><b>*</b>
                                <input type="email" value="{{$paciente->email}}" name="email" class="form-control" required>
                                @error('email')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <br>

                    
                    <div class="row">

                        <!--campo dirección-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Dirección</label><b>*</b>
                                <input type="address" value="{{$paciente->direccion}}" name="direccion" class="form-control" required>
                                @error('direccion')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                         <!--campo grupo sanguíneo-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Grupo Sanguíneo</label>
                                <select name="grupo_sanguineo" id="" class="form-control">
                                    <option value="A+" @selected($paciente->grupo_sanguineo == 'A+')>A+</option>
                                    <option value="A-" @selected($paciente->grupo_sanguineo == 'A-')>A-</option>
                                    <option value="B+" @selected($paciente->grupo_sanguineo == 'B+')>B+</option>
                                    <option value="B-" @selected($paciente->grupo_sanguineo == 'B-')>B-</option>
                                    <option value="O+" @selected($paciente->grupo_sanguineo == 'O+')>O+</option>
                                    <option value="O-" @selected($paciente->grupo_sanguineo == 'O-')>O-</option>
                                </select>
                            </div>
                        </div>

                        <!--campo alergias-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Alergias</label><b>*</b>
                                <input type="text" value="{{$paciente->alergias}}" name="alergias" class="form-control" required>
                                @error('alergias')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <br>

                    
                    <div class="row">

                        <!--campo contacto de emergencia-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Contacto de emergencia</label><b>*</b>
                                <input type="text" value="{{$paciente->contacto_emergencia}}" name="contacto_emergencia" class="form-control" required>
                                @error('contacto_emergencia')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                         <!--campo observaciones-->
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="">Observaciones</label>
                                <input type="text" value="{{$paciente->observaciones}}" name="observaciones" class="form-control"></textarea>
                                @error('contacto_emergencia')
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
                                <a href="{{url('admin/pacientes')}}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-success">Actualizar paciente</button>
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