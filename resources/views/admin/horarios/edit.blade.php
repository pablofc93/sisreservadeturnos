@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Modificar horario del consultorio: {{$horario->consultorio->nombre}}</h1><br>
    <h1>Asignado actualmente al doctor: {{$horario->doctor->nombres}}</h1>


</div>

<hr>
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">Complete los campos</h3><br>
            </div>

            <!--cuerpo del formulario-->
            <div class="card-body row">
                <div class="col-md-3">

                    <!-- este error se muestra apenas se envian los datos con un cartel rojo -->
                    <!-- @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif -->


                    <form action="{{url('/admin/horarios',$horario->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">

                            <!--consultorios -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Consultorios</label><b>*</b>
                                    <select name="consultorio_id" id="consultorio_select" class="form-control">
                                        <option value="">Seleccionar consultorio</option>
                                        @foreach($consultorios as $consultorio)
                                        <option value="{{$consultorio->id}}">{{$consultorio->nombre." - ".$consultorio->ubicacion}}</option>
                                        @endforeach
                                    </select>

                                    <!-- script de jquery para que se muestren los horarios de cada consultorio -->
                                    <script>
                                        $('#consultorio_select').on('change', function() {
                                            var consultorio_id = $('#consultorio_select').val();
                                            //alert(consultorio_id);
                                            var url = "{{route('admin.horarios.cargar_datos_consultorios',':id')}}";
                                            url = url.replace(':id', consultorio_id);

                                            if (consultorio_id) {
                                                $.ajax({
                                                    url: url,
                                                    type: 'GET',
                                                    success: function(data) {
                                                        $('#consultorio_info').html(data);
                                                    },
                                                    error: function() {
                                                        alert('Error al obtener los datos del consultorio');
                                                    }
                                                });
                                            } else {
                                                $('#consultorio_info').html('');
                                            }
                                        });
                                    </script>

                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <!--doctores -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Doctores</label><b>*</b>
                                    <select name="doctor_id" id="doctor_id" class="form-control">
                                        @foreach($doctores as $doctor)
                                        <option value="{{$doctor->id}}">{{$doctor->nombres." ".$doctor->apellido." - ".$doctor->especialidad}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <!--campo día-->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Día</label><b>*</b>
                                    <select name="dia" id="dia" class="form-control">
                                        <option value="LUNES">LUNES</option>
                                        <option value="MARTES">MARTES</option>
                                        <option value="MIÉRCOLES">MIÉRCOLES</option>
                                        <option value="JUEVES">JUEVES</option>
                                        <option value="VIERNES">VIERNES</option>
                                        <option value="SÁBADO">SÁBADO</option>
                                        <option value="DOMINGO">DOMINGO</option>
                                    </select>
                                </div>
                            </div>

                            <!--campo hora-inicio-->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Hora de inicio</label><b>*</b>
                                    <input type="time" value="{{ old('hora_inicio') }}" name="hora_inicio" class="form-control" required>
                                    @error('hora_inicio')
                                    <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!--campo hora-final-->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Hora de finalización</label><b>*</b>
                                    <input type="time" value="{{ old('hora_fin') }}" name="hora_fin" class="form-control" required>
                                    @error('hora_fin')
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
                                    <button type="submit" class="btn btn-success">Modificar horario</button>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </form>
                </div>

                <div class="col-md-9">
                    <hr>
                    <div id="consultorio_info">

                    </div>

                </div>

            </div>
        </div>
    </div>

</div>
@endsection