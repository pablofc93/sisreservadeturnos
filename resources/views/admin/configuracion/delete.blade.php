@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Eliminar configuración</h1>
</div>

<hr>
<div class="row">
    <div class="col-md-12">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">¿Está seguro de eliminar este registro?</h3>
            </div>
            <!--cuerpo del formulario-->
            <div class="card-body">

                <form action="{{url('/admin/configuracion',$configuracion->id)}}" method="POST">
                    @csrf
                    @method('DELETE')

                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">

                                <!--campo nombre-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nombre del hospital/clínica</label>
                                        <input type="text" value="{{$configuracion->nombre}}" name="nombre" class="form-control" disabled>
                                        @error('nombre')
                                        <small style="color:red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!--campo direccion-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Dirección</label>
                                        <input type="address" value="{{$configuracion->direccion}}" name="direccion" class="form-control" disabled>
                                        @error('direccion')
                                        <small style="color:red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <br>

                            <div class="row">

                                <!--campo telefono-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Teléfono</label>
                                        <input type="text" value="{{$configuracion->telefono}}" name="telefono" class="form-control" disabled>
                                        @error('telefono')
                                        <small style="color:red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!--campo correo-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Correo electrónico</label>
                                        <input type="email" value="{{$configuracion->correo}}" name="correo" class="form-control" disabled>
                                        @error('correo')
                                        <small style="color:red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!--logotipo-->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Logotipo</label>
                                <br>

                                <!--script para previsualizar la imagen del logo antes de cargarlo-->
                                <center>
                                    <output id="list">
                                        <img style="text-align:center;" src="{{asset('storage/'.$configuracion->logo)}}" alt="logo" width="100px">
                                    </output>
                                </center>

                            </div>
                        </div>
                    </div>


                    <hr>

                    <!--botón de verificación-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('admin/configuracion')}}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-danger">Eliminar configuración</button>
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