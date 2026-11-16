@extends('layouts.admin')
@section('content')
<div class="row">
  <h3>Bienvenido: {{Auth::user()->email}} - Rol: {{Auth::user()->roles->pluck('name')->first()}}</h3>
</div>
<hr>

<div class="row">

  <!--usuarios-->
  @can('admin.usuarios.index') <!--solamente aquel que tenga permisos va a poder visualizar esto-->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{$total_usuarios}}</h3>

        <p>Usuarios</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag fas bi bi-file-person"></i>
      </div>
      <a href="{{url('admin/usuarios')}}" class="small-box-footer">Más Información <i class="fas bi bi-file-person"></i></a>
    </div>
  </div>
  @endcan


  <!--secretarias-->
  @can('admin.secretarias.index')
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{$total_secretarias}}</h3>

        <p>Secretarias</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag fas bi bi-file-person"></i>
      </div>
      <a href="{{url('admin/secretarias')}}" class="small-box-footer">Más Información <i class="fas bi bi-file-person"></i></a>
    </div>
  </div>
  @endcan

  <!--pacientes-->
  @can('admin.pacientes.index')
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{$total_pacientes}}</h3>

        <p>Pacientes</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag fas bi bi-bandaid"></i>
      </div>
      <a href="{{url('admin/pacientes')}}" class="small-box-footer">Más Información <i class="fas bi bi-file-person"></i></a>
    </div>
  </div>
  @endcan

  <!--consultorios-->
  @can('admin.consultorios.index')
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>{{$total_consultorios}}</h3>

        <p>Consultorios</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag fas bi bi-hospital"></i>
      </div>
      <a href="{{url('admin/consultorios')}}" class="small-box-footer">Más Información <i class="fas bi bi-file-person"></i></a>
    </div>
  </div>
  @endcan

  <!--doctores-->
  @can('admin.doctores.index')
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>{{$total_doctores}}</h3>

        <p>Doctores</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag fas bi bi-person-heart"></i>
      </div>
      <a href="{{url('admin/consultorios')}}" class="small-box-footer">Más Información <i class="fas bi bi-file-person"></i></a>
    </div>
  </div>
  @endcan

  <!--horarios-->
  @can('admin.horarios.index')
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-secondary">
      <div class="inner">
        <h3>{{$total_horarios}}</h3>

        <p>Horarios</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag fas bi bi-alarm"></i>
      </div>
      <a href="{{url('admin/horarios')}}" class="small-box-footer">Más Información <i class="fas bi bi-file-person"></i></a>
    </div>
  </div>
  @endcan

  <!--reservas-->
  @can('admin.horarios.index')
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{$total_eventos}}</h3>

        <p>Reservas</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag fas bi bi-calendar-check"></i>
      </div>
      <a href="{{url('admin/horarios')}}" class="small-box-footer"><i class="fas bi bi-calendar-check"></i></a>
    </div>
  </div>
  @endcan
  
  <!--configuracion-->
  @can('admin.horarios.index')
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{$total_configuracion}}</h3>

        <p>Registros de configuración</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag fas bi bi-wrench"></i>
      </div>
      <a href="{{url('admin/configuracion')}}" class="small-box-footer">Más información <i class="fas bi bi-wrench"></i></a>
    </div>
  </div>
  @endcan


</div>


@can('cargar_datos_consultorios')
<!--calendario de atención de doctores-->
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

        <!-- script de jquery para que se muestren los horarios de cada consultorio -->
        <script>
          $('#consultorio_select').on('change', function() {
            var consultorio_id = $('#consultorio_select').val();
            //alert(consultorio_id);

            if (consultorio_id) {
              $.ajax({
                url: "{{url('/consultorios/')}}" + '/' + consultorio_id,
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
        <div id="consultorio_info"></div>

      </div>
    </div>
  </div>
</div>

<!--calendario de reserva de turnos-->

<div class="row">

  <div class="col-md-12">
    <div class="card card-outline card-warning">
      <div class="card-header">
        <!-- <h3 class="card-title">Calendario de atención de doctores</h3> -->
        <div class="row">
          <div class="col-md-4">
            <h3 class="card-title">Calendario de reserva de turnos médicos</h3>
          </div>
          <div class="col-md-4">
            <div style="float: right">
              <label for="">Doctores</label>
            </div>
          </div>
          <div class="col-md-4">
            <select name="doctor_id" id="doctor_select" class="form-control">
              <option value="">Seleccione un doctor</option>
              @foreach($doctores as $doctor)
              <option value="{{$doctor->id}}">{{$doctor->nombres." ".$doctor->apellido." - ".$doctor->especialidad}}</option>
              @endforeach
            </select>

            <!-- script de jquery para que se muestren los horarios de cada doctor -->
            <script>
              $('#doctor_select').on('change', function() {
                var doctor_id = $('#doctor_select').val();
                //alert(doctor_id);

                //script de calendario para mostrar los turnos según el doctor
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                  initialView: 'dayGridMonth',
                  locale: 'es',
                  events: [],
                });        
                //fin de script de calendario

                if (doctor_id) {
                  $.ajax({
                    url: "{{url('/cargar_reserva_doctores/')}}" + '/' + doctor_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                      calendar.addEventSource(data);
                    },
                    error: function() {
                      alert('Error al obtener los datos del consultorio');
                    }
                  });
                } else {
                  $('#consultorio_info').html('');
                }
                calendar.render();
              });
            </script>

          </div>
        </div>
      </div>

      <div class="card-body">

        <div class="row">

          <!--ventana modal-->
          <!-- Button trigger modal -->
          <div class="col-auto">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Registrar turno médico
            </button>

            <a href="{{url('admin/ver_reservas',Auth::user()->id)}}" class="btn btn-success"><i class="bi bi-calendar2-check"></i> Ver las reservas de turnos</a>

          </div>

          <!-- Modal -->
          <form action="{{url('/admin/eventos/create')}}" method="POST">
            @csrf
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">

                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Reserva de turno</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <!-- Cuerpo del modal -->
                  <div class="modal-body">

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="">Doctor</label>
                          <select name="doctor_id" id="doctor_select" class="form-control">
                            @foreach($doctores as $doctor)
                            <option value="{{$doctor->id}}">
                              {{$doctor->nombres." ".$doctor->apellido." - ".$doctor->especialidad}}
                            </option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>


                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Fecha de reserva</label>
                        <input type="date" id="fecha_reserva" value="<?php echo date('Y-m-d'); ?>" name="fecha_reserva" class="form-control">

                        <script>
                          document.addEventListener('DOMContentLoaded', function() {
                            const fechaReservaInput = document.getElementById('fecha_reserva');

                            //Escuchar el evento de cambio en el campo de fecha de reserva
                            fechaReservaInput.addEventListener('change', function() {
                              let selectedDate = this.value; //Obtener la fecha seleccionada

                              //Obtener la fecha actual en formato ISO (yyy-mm-dd)
                              let today = new Date().toISOString().slice(0, 10);

                              //Verificar si la fecha seleccionada es anterior a la fecha actual
                              if (selectedDate < today) {
                                //Si es así, establecer la fecha seleccionada en null
                                this.value = null;
                                alert('No puede seleccionar una fecha pasada');
                              }
                            });
                          });
                        </script>

                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Hora de reserva</label>
                        <input type="time" id="hora_reserva" name="hora_reserva" class="form-control">
                        @error('hora_reserva')
                        <small style="color:red">{{ $message }}</small>
                        @enderror

                        @if( (($message = Session::get('hora_reserva'))) )
                        <script>
                          /*  document.addEventListener('DOMContentLoaded', function(){
                                      $('#exampleModal').modal('show');
                                    }); */
                          document.addEventListener('DOMContentLoaded', function() {
                            var modal = new bootstrap.Modal(document.getElementById('exampleModal'));
                            modal.show();
                          });
                        </script>
                        <small style="color:red">{{ $message }}</small>
                        @endif

                        <!--script para validar que no se seleccione una hora fuera del rango establecido-->
                        <script>
                          document.addEventListener('DOMContentLoaded', function() {
                            const horaReservaInput = document.getElementById('hora_reserva');

                            horaReservaInput.addEventListener('change', function() {
                              let selectedTime = this.value; //Obtener el valor de la hora seleccionada

                              //Asegurar que solo se capture la parte de la hora
                              if (selectedTime) {
                                selectedTime = selectedTime.split(':'); //Dividir la cadena en horas y minutos
                                selectedTime = selectedTime[0] + ':00'; //Conservar solo la hora, ignorar los minutos y segundos
                                this.value = selectedTime; //Establecer la hora modificada en el campo de entrada
                              }

                              //Verificar si la hora seleccionada está fuera del rango permitido
                              if (selectedTime < '08:00' || selectedTime > '21:00') {
                                //Si es así, establecer la hora seleccionada en null
                                this.value = null;
                                alert('Seleccione una hora entre 08:00 y 21:00.');

                              }
                            });
                          });
                        </script>

                      </div>
                    </div>
                  </div><!-- Fin de modal-body -->

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Registrar turno</button>
                  </div>

                </div> <!-- Fin de modal-content -->



              </div> <!-- Fin de modal-dialog -->
            </div> <!--fin del modal fade-->
          </form>
        </div>

      </div>

    </div>

    <div id='calendar'></div>
  </div>

  <!--seleccion de los consultorios disponibles-->


</div><!--fin del row-->
@endcan

@if(Auth::check() && Auth::user()->doctor)

<!--calendario de reservas de cada doctor-->
<div class="row">

  <div class="col-md-12">
    <div class="card card-outline card-primary">
      <div class="card-header">
        <div class="row">
          <div class="col-md-4">
            <h3 class="card-title">Calendario de reservas</h3>
          </div>
        </div>
      </div>

      <!--seleccion de los consultorios disponibles-->
      <div class="card-body">

        <table id="example1" class="table table-striped table-bordered table-hover table-sm">
          <thead style="background-color: #c0c0c0">
            <tr>
              <td style="text-align: center;"><b>Nro</b></td>
              <td style="text-align: center;"><b>Usuario</b></td>
              <td style="text-align: center;"><b>Fecha de reserva</b></td>
              <td style="text-align: center;"><b>Hora de reserva</b></td>
            </tr>
          </thead>
          <tbody>
            <?php $contador = 1; ?>
            @foreach($eventos as $evento)
            @if(Auth::user()->doctor->id == $evento->doctor_id)
              <tr>
                <td style="text-align: center;">{{$contador++}}</td>
                <td style="text-align: center;">{{$evento->user->name}}</td>
                <td style="text-align: center;">{{\Carbon\Carbon::parse($evento->start)->format('Y-m-d')}}</td>
                <td style="text-align: center;">{{\Carbon\Carbon::parse($evento->start)->format('H:i')}}</td>
              </tr>
            @endif

            @endforeach
          </tbody>
        </table>

        <script>
          $(function() {
            $("#example1").DataTable({
              "pageLength": 10,
              "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Reservas",
                "infoEmpty": "Mostrando 0 a 0 de 0 Reservas",
                "infoFiltered": "(Filtrado de _MAX_ total Reservas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Reservas",
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
                    text: 'Copiar',
                    extend: 'copy',
                  }, {
                    extend: 'pdf'
                  }, {
                    extend: 'csv'
                  }, {
                    extend: 'excel'
                  }, {
                    text: 'Imprimir',
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
@endif




@endsection