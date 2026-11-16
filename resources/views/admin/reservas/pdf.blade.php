<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ✅ Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <table border="0" style="font-size: 8pt;">
        <tr>
            <td style="text-align: center;">
                {{$configuracion->nombre}}<br>
                {{$configuracion->direccion}}<br>
                {{$configuracion->telefono}}<br>
                {{$configuracion->correo}}
            </td>
            <td width="490px"></td>
            <td>
                <img style="text-align:center;" src="{{asset('storage/'.$configuracion->logo)}}" alt="logo" width="80px">
            </td>
        </tr>
    </table>
    <br>

    <h2 style="text-align: center;"><u>Listado de todas las reservas médicas</u></h2>

    <br>

    <table class="table table-bordered table-sm table-striped">
        <thead>
            <tr style="background-color:#e7e7e7;">
                <th>Nro</th>
                <th>Doctor</th>
                <th>Especialidad</th>
                <th>Fecha de reserva</th>
                <th>Hora de reserva</th>
            </tr>
        </thead>
        <tbody>
        <?php $contador = 1 ?>
        @foreach($eventos as $evento)
            <tr>
                <td style="text-align: center;">{{$contador++}}</td>
                <td style="text-align: center;">{{$evento->doctor->nombres." ".$evento->doctor->apellido}}</td>
                <td style="text-align: center;">{{$evento->doctor->especialidad}}</td>
                <td style="text-align: center;">{{\Carbon\Carbon::parse($evento->start)->format('Y-m-d')}}</td>
                <td style="text-align: center;">{{\Carbon\Carbon::parse($evento->start)->format('H:i')}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- ✅ Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>