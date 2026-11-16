@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Informes de reservas de turnos médicos</h1>
</div>

<hr>
<div class="row">
    <div class="col-md-4">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Generar informe</h3>
            </div>

            <div class="card-body">
                <a href="{{url('/admin/reservas/pdf')}}" class="btn btn-success">
                    <i class="bi bi-printer"></i> Listado de todas las reservas
                </a>
                <br><br>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Generar informe por fecha</h3>
            </div>

            <div class="card-body">
                <form action="{{route('admin.reservas.pdf_fechas')}}" method="get">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Fecha de inicio: </label>
                            <input type="date" name="fecha_inicio" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="">Fecha de fin: </label>
                            <input type="date" name="fecha_fin" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <div style="height: 32px;"></div>
                            <button class="btn btn-success"><i class="bi bi-printer"></i>Generar informe</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection