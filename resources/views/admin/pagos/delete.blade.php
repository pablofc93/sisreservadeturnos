@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Pago del paciente {{$pago->paciente->apellido." ".$pago->paciente->nombres}}</h1>
</div>

<hr>
<div class="row">
    <div class="col-md-12">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">¿ Está seguro de eliminar este registro ?</h3>
            </div>
            <!--cuerpo del formulario-->
            <div class="card-body">
                <form action="{{url('/admin/pagos',$pago->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">

                                <!--campo nombre del paciente-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Paciente</label>
                                        <p>{{$pago->paciente->apellido." ".$pago->paciente->nombres}}</p>
                                    </div>
                                </div>

                                <!--campo nombre de doctores-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Doctores</label>
                                        <p>{{$pago->doctor->apellido." ".$pago->doctor->nombres}}</p>
                                    </div>
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <!--campo fecha de pago-->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Fecha de pago</label>
                                        <p>{{$pago->fecha_pago}}</p>
                                    </div>
                                </div>

                                <!--campo monto-->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Monto</label>
                                        <p>{{$pago->monto}}</p>
                                    </div>
                                </div>

                                <!--campo descripcion-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Descripción</label>
                                        <p>{{$pago->descripcion}}</p>
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
                                <a href="{{url('admin/pagos')}}" class="btn btn-secondary">Volver</a>
                                <button type="submit" class="btn btn-danger">Eliminar</button>
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