@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Registro de un nuevo paciente</h1>
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

                <form action="{{url('/admin/pacientes/create')}}" method="POST">
                    @csrf
                    
                    <div class="row">

                        <!--campo nombre-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Nombre</label><b>*</b>
                                <input type="text" value="{{old('nombres')}}" name="nombres" class="form-control" required>
                                @error('nombres')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!--campo apellido-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Apellido</label><b>*</b>
                                <input type="text" value="{{old('apellido')}}" name="apellido" class="form-control" required>
                                @error('apellido')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!--campo dni-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">DNI</label><b>*</b>
                                <input type="text" value="{{old('dni')}}" name="dni" class="form-control" required>
                                @error('dni')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!--campo nro_seguro-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Número de seguro</label><b>*</b>
                                <input type="text" value="{{old('nro_seguro')}}" name="nro_seguro" class="form-control" required>
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
                                <input type="date" value="{{old('fecha_nacimiento')}}" name="fecha_nacimiento" class="form-control" required>
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
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                            </div>
                        </div>

                        <!--campo celular-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Celular</label><b>*</b>
                                <input type="text" value="{{old('celular')}}" name="celular" class="form-control" required>
                                @error('celular')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!--campo email-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Correo electrónico</label><b>*</b>
                                <input type="email" value="{{old('email')}}" name="email" class="form-control" required>
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
                                <input type="address" value="{{ old('direccion') }}" name="direccion" class="form-control" required>
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
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </div>
                        </div>

                        <!--campo alergias-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Alergias</label><b>*</b>
                                <input type="text" value="{{old('alergias')}}" name="alergias" class="form-control" required>
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
                                <input type="text" name="contacto_emergencia" class="form-control" required>
                                @error('contacto_emergencia')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                         <!--campo observaciones-->
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="">Observaciones</label>
                                <textarea type="text" name="observaciones" class="form-control"></textarea>
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
                                <button type="submit" class="btn btn-primary">Registrar paciente</button>
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