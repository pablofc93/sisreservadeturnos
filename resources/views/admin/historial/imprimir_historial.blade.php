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

    <h2 style="text-align: center;"><u>Historial clínico</u></h2>

    <br>

    <h4>información del paciente</h4>
    <table>
        <tr>
            <td><b>Paciente: </b></td>
            <td>{{$paciente->apellido." ".$paciente->nombres}}</td>
        </tr>
        <tr>
            <td><b>DNI: </b></td>
            <td>{{$paciente->dni}}</td>
        </tr>
        <tr>
            <td><b>Nro de seguro: </b></td>
            <td>{{$paciente->nro_seguro}}</td>
        </tr>
         <tr>
            <td><b>Fecha de nacimiento: </b></td>
            <td>{{$paciente->fecha_nacimiento}}</td>
        </tr>
    </table>

    <hr>

    <h4>Observaciones realizadas</h4>

    @foreach($historiales as $historial)
    <hr>
    <table>
        <tr>
            <td><b>Fecha: </b></td>
            <td>{{$historial->fecha_visita}}</td>
        </tr>
        <tr><br></tr>
        <tr>
            <td><b>Resultado: </b></td>
        </tr>
        <tr>
            <br>
            <td>{!! $historial->detalle !!}</td>
        </tr>
    </table>
    <hr>
    @endforeach

    <!-- ✅ Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>