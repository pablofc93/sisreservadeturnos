@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Modificar historial</h1>
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

                <form action="{{url('/admin/historial',$historial->id)}}" method="POST">
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
                                            <option value="{{$paciente->id}}" {{$historial->paciente_id == $paciente->id ? 'selected':''}} >{{$paciente->apellido." ".$paciente->nombres}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!--campo fecha-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Fecha del turno médico</label><b>*</b>
                                        <input type="date" value="{{$historial->fecha_visita}}" name="fecha_visita" class="form-control">
                                    </div>
                                </div>

                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Detalle del turno</label>

                                        <textarea name="detalle" class="form-control" id="editor" cols="30" rows="100" style="width: 100%; height: 500px;">{!!$historial->detalle!!}</textarea>

                                        <!--script para el text area-->
                                        <script>
                                            ClassicEditor
                                                .create(document.querySelector('#editor'))
                                                .catch(error => {
                                                    console.error(error);
                                                });
                                        </script>
                                        
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
                                <a href="{{url('admin/historial')}}" class="btn btn-secondary">Cancelar</a>
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