@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Listado de pacientes</h1>
</div>
<hr>

<div class="row">

    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Pacientes registrados</h3>
                <div class="card-tools">
                    <a href="{{url('admin/pacientes/create')}}" class="btn btn-primary">
                        Registrar nuevo
                    </a>
                </div>
            </div>

            <div class="card-body">

                <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                    <thead style="background-color: #c0c0c0">
                        <tr>
                            <td style="text-align: center;"><b>Nro</b></td>
                            <td style="text-align: center;"><b>Nombre y Apellido</b></td>
                            <td style="text-align: center;"><b>DNI</b></td>
                            <td style="text-align: center;"><b>Nro. de seguro</b></td>
                            <td style="text-align: center;"><b>Fecha de Nacimiento</b></td>
                            <td style="text-align: center;"><b>Género</b></td>
                            <td style="text-align: center;"><b>Celular</b></td>
                            <td style="text-align: center;"><b>Email</b></td>
                            <td style="text-align: center;"><b>Dirección</b></td>
                            <td style="text-align: center;"><b>Acciones</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $contador = 1; ?>
                        @foreach($pacientes as $paciente)
                        <tr>
                            <td style="text-align: center;">{{$contador++}}</td>
                            <td style="text-align: center;">{{$paciente->nombres}} {{$paciente->apellido}}</td>
                            <td style="text-align: center;">{{$paciente->dni}}</td>
                            <td style="text-align: center;">{{$paciente->nro_seguro}}</td>
                            <td style="text-align: center;">{{$paciente->fecha_nacimiento}}</td>
                            <td style="text-align: center;">{{$paciente->genero}}</td>
                            <td style="text-align: center;">{{$paciente->celular}}</td>
                            <td style="text-align: center;">{{$paciente->email}}</td>
                            <td style="text-align: center;">{{$paciente->direccion}}</td>
                            <td style="text-align: center;">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{url('admin/pacientes/'.$paciente->id)}}" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                    <a href="{{url('admin/pacientes/'.$paciente->id.'/edit')}}" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                    <a href="{{url('admin/pacientes/'.$paciente->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></a>
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
                                "info": "Mostrando _START_ a _END_ de _TOTAL_ Pacientes",
                                "infoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
                                "infoFiltered": "(Filtrado de _MAX_ total Pacientes)",
                                "infoPostFix": "",
                                "thousands": ",",
                                "lengthMenu": "Mostrar _MENU_ Pacientes",
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
@endsection