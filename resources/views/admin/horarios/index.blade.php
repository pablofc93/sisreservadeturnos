@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Listado de horarios</h1>
</div>

<hr>
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Horarios registrados</h3>

                <div class="card-tools">
                    <a href="{{url('admin/horarios/create')}}" class="btn btn-primary">
                        Registrar nuevo
                    </a>
                </div>

            </div>

            <!--cuerpo del formulario-->
            <div class="card-body">
                <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                    <thead style="background-color: #c0c0c0">
                        <tr>
                            <td style="text-align: center;"><b>Nro</b></td>
                            <td style="text-align: center;"><b>Doctor</b></td>
                            <td style="text-align: center;"><b>Especialidad</b></td>
                            <td style="text-align: center;"><b>Consultorio</b></td>
                            <td style="text-align: center;"><b>Día de atención</b></td>
                            <td style="text-align: center;"><b>Hora de inicio</b></td>
                            <td style="text-align: center;"><b>Hora de finalización</b></td>
                            <td style="text-align: center;"><b>Acciones</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $contador = 1; ?>
                        @foreach($horarios as $horario)
                        <tr>
                            <td style="text-align: center;">{{$contador++}}</td>
                            <td style="text-align: center;">{{$horario->doctor->nombres}} {{$horario->doctor->apellido}}</td>
                            <td style="text-align: center;">{{$horario->doctor->especialidad}}</td>
                            <td style="text-align: center;">{{$horario->consultorio->nombre." Ubicación: ".$horario->consultorio->ubicacion}}</td>
                            <td style="text-align: center;">{{$horario->dia}}</td>
                            <td style="text-align: center;">{{$horario->hora_inicio}}</td>
                            <td style="text-align: center;">{{$horario->hora_fin}}</td>
                            <td style="text-align: center;">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{url('admin/horarios/'.$horario->id)}}" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                    <a href="{{url('admin/horarios/'.$horario->id.'/edit')}}" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                    <a href="{{url('admin/horarios/'.$horario->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <script>
                    $(function() {
                        $("#example1").DataTable({
                            "pageLength": 10,
                            "language": {
                                "emptyTable": "No hay información",
                                "info": "Mostrando _START_ a _END_ de _TOTAL_ Horarios",
                                "infoEmpty": "Mostrando 0 a 0 de 0 Horarios",
                                "infoFiltered": "(Filtrado de _MAX_ total Horarios)",
                                "infoPostFix": "",
                                "thousands": ",",
                                "lengthMenu": "Mostrar _MENU_ Horarios",
                                "loadingRecords": "Cargando...",
                                "processing": "Procesando...",
                                "search": "Buscador:",
                                "zeroRecords": "Sin resultados encontrados",
                                "paginate": {
                                    "first": "Primero",
                                    "last": "Ultimo",
                                    "next": "Siguiente",
                                    "previous": "Anterior"
                                }
                            },
                            "responsive": true,
                            "lengthChange": true,
                            "autoWidth": false,
                            buttons: [{
                                    extend: 'collection',
                                    text: 'Reportes',
                                    orientation: 'landscape',
                                    buttons: [{
                                        text: '<button class="btn btn-primary btn-sm btn-block"><i class="bi bi-copy"></i> COPIAR</button>',
                                        extend: 'copy',
                                    }, {
                                        text: '<button class="btn btn-danger btn-sm btn-block"><i class="bi bi-file-earmark-pdf-fill"></i> PDF</button>',
                                        extend: 'pdf'
                                    }, {
                                        text: '<button class="btn btn-secondary btn-sm btn-block"><i class="bi bi-filetype-csv"></i> CSV</button>',
                                        extend: 'csv'
                                    }, {
                                        text: '<button class="btn btn-success btn-sm btn-block"><i class="bi bi-file-earmark-excel-fill"></i> EXCEL</button>',
                                        extend: 'excel'
                                    }, {
                                        text: '<button class="btn btn-primary btn-sm btn-block"><i class="bi bi-printer"></i> IMPRIMIR</button>',
                                        extend: 'print'
                                    }]
                                },
                                {
                                    extend: 'colvis',
                                    text: 'Visor de columnas',
                                    collectionLayout: 'fixed three-column'
                                }
                            ],
                        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                    });
                </script>
            </div>
        </div>
    </div>
</div>

<!--calendario de horarios-->
<div class="row">

    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <!-- <h3 class="card-title">Calendario de atención de doctores</h3> -->
                <div class="row"> 
                    <div class="col-md-4">
                        <h3 class="card-title">Calendario de atención de doctores</h3>
                    </div>
                    <div class="col-md-4">
                        <div style="float: right">
                            <label for="">Consultorios</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <select name="consultorio_id" id="consultorio_select" class="form-control">
                            <option value="">Seleccione un consultorio</option>
                            @foreach($consultorios as $consultorio)
                            <option value="{{$consultorio->id}}">{{$consultorio->nombre." - ".$consultorio->ubicacion}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!--seleccion de los consultorios disponibles-->
            <div class="card-body">
                <!-- <div class="row">
                    
                    <div class="form-group">
                        <label for="">Consultorios</label>
                        <select name="consultorio_id" id="consultorio_select" class="form-control">
                            @foreach($consultorios as $consultorio)
                            <option value="{{$consultorio->id}}">{{$consultorio->nombre." - ".$consultorio->ubicacion}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <hr> -->


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
                <hr>

                <!--aquí se muestran los datos del consultorio que sea seleccionado en el select-->
                <div id="consultorio_info">

                    <table style="font-size: 15px; text-align: center" class="table table-striped table-hover table-sm table-bordered">
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
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection