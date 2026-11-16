@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Listado de consultorios</h1>
</div>
<hr>

<div class="row">

    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Consultorios registrados</h3>
                <div class="card-tools">
                    <a href="{{url('admin/consultorios/create')}}" class="btn btn-primary">
                        Registrar nuevo
                    </a>
                </div>
            </div>

            <div class="card-body">

                <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                    <thead style="background-color: #c0c0c0">
                        <tr>
                            <td style="text-align: center;"><b>Nro</b></td>
                            <td style="text-align: center;"><b>Consultorio</b></td>
                            <td style="text-align: center;"><b>Ubicacion</b></td>
                            <td style="text-align: center;"><b>Capacidad</b></td>
                            <td style="text-align: center;"><b>Teléfono</b></td>
                            <td style="text-align: center;"><b>Especialidad</b></td>
                            <td style="text-align: center;"><b>Estado</b></td>
                            <td style="text-align: center;"><b>Acciones</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $contador = 1; ?>
                        @foreach($consultorios as $consultorio)
                        <tr>
                            <td style="text-align: center;">{{$contador++}}</td>
                            <td style="text-align: center;">{{$consultorio->nombre}}</td>
                            <td style="text-align: center;">{{$consultorio->ubicacion}}</td>
                            <td style="text-align: center;">{{$consultorio->capacidad}}</td>
                            <td style="text-align: center;">{{$consultorio->telefono}}</td>
                            <td style="text-align: center;">{{$consultorio->especialidad}}</td>
                            <td style="text-align: center;">{{$consultorio->estado}}</td>
                            <td style="text-align: center;">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{url('admin/consultorios/'.$consultorio->id)}}" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></button></a>
                                    <a href="{{url('admin/consultorios/'.$consultorio->id.'/edit')}}" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></button></a>
                                    <a href="{{url('admin/consultorios/'.$consultorio->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></button></a>
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
                                "info": "Mostrando _START_ a _END_ de _TOTAL_Consultorios",
                                "infoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
                                "infoFiltered": "(Filtrado de _MAX_ total Consultorios)",
                                "infoPostFix": "",
                                "thousands": ",",
                                "lengthMenu": "Mostrar _MENU_ Consultorios",
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