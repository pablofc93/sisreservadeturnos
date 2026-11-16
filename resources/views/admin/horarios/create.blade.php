@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Registro de un nuevo horario</h1>
</div>

<hr>
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Complete los campos</h3>
            </div>

            <!--cuerpo del formulario-->
            <div class="card-body row">
                <div class="col-md-3">
                    <form action="{{url('/admin/horarios/create')}}" method="POST">
                        @csrf

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
                                    
                                            if (consultorio_id) {
                                                $.ajax({
                                                    url: "{{url('/admin/horarios/consultorios/')}}" + '/' + consultorio_id,
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
                                    <button type="submit" class="btn btn-primary">Registrar horario</button>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </form>
                </div>

                <div class="col-md-9">

                    <!-- tabla de la izquierda -->
                    <!-- <table style="font-size: 15px; text-align: center" class="table table-striped table-hover table-sm table-bordered">
                        <thead>
                            <tr style="text-align: center;">
                                <th>Hora/Día</th>
                                <th>Lunes</th>
                                <th>Martes</th>
                                <th>Miércoles</th>
                                <th>Jueves</th>
                                <th>Viernes</th>
                                <th>Sábado</th>
                                <th>Domingo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $horas = [
                            '08:00:00 - 09:00:00',
                            '09:00:00 - 10:00:00',
                            '10:00:00 - 11:00:00',
                            '11:00:00 - 12:00:00',
                            '12:00:00 - 13:00:00',
                            '13:00:00 - 14:00:00',
                            '14:00:00 - 15:00:00',
                            '15:00:00 - 16:00:00',
                            '16:00:00 - 17:00:00',
                            '17:00:00 - 18:00:00',
                            '18:00:00 - 19:00:00',
                            '19:00:00 - 20:00:00',
                            '20:00:00 - 21:00:00',
                            ];
                            $diasSemana = [
                            'LUNES',
                            'MARTES',
                            'MIÉRCOLES',
                            'JUEVES',
                            'VIERNES',
                            'SÁBADO',
                            'DOMINGO'
                            ];
                            @endphp
                            @foreach($horas as $hora)
                            @php
                            list($hora_inicio, $hora_fin) = explode(' - ',$hora);
                            @endphp
                            <tr>
                                <td>{{$hora}}</td>
                                @foreach($diasSemana as $dia)
                                @php
                                $nombre_doctor = '';
                                foreach($horarios as $horario){
                                if(strtoupper($horario->dia) == $dia &&
                                $hora_inicio >= $horario->hora_inicio &&
                                $hora_fin <= $horario->hora_fin){
                                    $nombre_doctor = $horario->doctor->nombres." ".$horario->doctor->apellido;
                                    break;
                                    }
                                    }
                                    @endphp
                                    <td>{{$nombre_doctor}}</td>
                                    @endforeach

                            </tr>
                            @endforeach
                        </tbody>
                    </table> -->
                    <hr>
                    <div id="consultorio_info">

                    </div>

                </div>

            </div>
        </div>
    </div>

</div>
@endsection