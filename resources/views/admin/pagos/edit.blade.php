@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Pago del paciente {{$pago->paciente->apellido." ".$pago->paciente->nombres}}</h1>
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

                <form action="{{url('/admin/pagos',$pago->id)}}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">

                                <!--campo nombre del paciente-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Paciente</label><b>*</b>
                                        <select name="paciente_id" id="" class="form-control">
                                            @foreach($pacientes as $paciente)
                                                <option value="{{$paciente->id}}" {{$paciente->id == $pago->paciente_id ? 'selected':''}} >{{$paciente->apellido." ".$paciente->nombres}}</option>>{{$paciente->apellido." ".$paciente->nombres}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!--campo nombre de doctores-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Doctores</label><b>*</b>
                                        <select name="doctor_id" id="" class="form-control">
                                            @foreach($doctores as $doctor)
                                                <option value="{{$doctor->id}}" {{$doctor->id == $pago->doctor_id ? 'selected':''}} >{{$doctor->apellido." ".$doctor->nombres." - ".$doctor->especialidad}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <!--campo fecha de pago-->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Fecha de pago</label><b>*</b>
                                        <input type="date" name="fecha_pago" value="{{$pago->fecha_pago}}" class="form-control">
                                    </div>
                                </div>

                                <!--campo monto-->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Monto</label><b>*</b>
                                        <input type="text" value="{{$pago->monto}}" name="monto" class="form-control">
                                    </div>
                                </div>

                                <!--campo descripcion-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Descripción</label><b>*</b>
                                        <input type="text" value="{{$pago->descripcion}}" name="descripcion" class="form-control">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                    <hr>

                    <!--botón de verificación-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('admin/pagos')}}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-success">Actualizar</button>
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