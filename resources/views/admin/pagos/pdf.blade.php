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

    <h2 style="text-align: center;"><u>COMPROBANTE DE PAGO - ORIGINAL</u></h2>

    <br>

    <table border="0" cellpading="4px">
        <tr>
            <td width="120px"><b>Sr(es):</b></td>
            <td>{{$pago->paciente->apellido." ".$pago->paciente->nombres}}</td>
            <td width="150px" rowspan="4"></td>
            <td rowspan="4">
                <div>
                    <img src="data:image/png;base64,{{ $qrCodeBase64 }}" alt="Código QR" width="150px">
                </div>
            </td>
        </tr>
        <tr>
             <td><b>Fecha:</b></td>
            <td>{{$pago->fecha_pago}}</td>
        </tr>
        <tr>
            <td><b>Consultorio: </b></td>
            <td>{{$pago->doctor->especialidad}}</td>
        </tr>
        <tr>
            <td><b>Monto: </b></td>
            <td>{{$pago->monto}}</td>
        </tr>
    </table>

    <!--tabla de firmas-->
    <br><br><br>
    <table border="0" style="font-size: 9pt;">
        <tr>
            <td width="210px">
                <p style="text-align: center">
                    __________________________<br>
                    <b>Secretaria</b><br>
                    {{Auth::user()->secretarias->apellido." ".Auth::user()->secretarias->nombres}}
                </p>
            </td>
            <td width="210px"></td>
                 <p style="text-align: center">
                    __________________________<br>
                    <b>Firma paciente</b><br>
                    
                </p>
            <td width="210px"></td>
        </tr>
    </table>

    <p>------------------------------------------------------------------------------------------------------------------</p>

    <!--tabla referida a la copia-->
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

    <h2 style="text-align: center;"><u>COMPROBANTE DE PAGO - COPIA</u></h2>

    <br>

    <table border="0" cellpading="4px">
        <tr>
            <td width="120px"><b>Sr(es):</b></td>
            <td>{{$pago->paciente->apellido." ".$pago->paciente->nombres}}</td>
            <td width="150px" rowspan="4"></td>
            <td rowspan="4">
                <div>
                    <img src="data:image/png;base64,{{ $qrCodeBase64 }}" alt="Código QR" width="150px">
                </div>
            </td>
        </tr>
        <tr>
             <td><b>Fecha:</b></td>
            <td>{{$pago->fecha_pago}}</td>
        </tr>
        <tr>
            <td><b>Consultorio: </b></td>
            <td>{{$pago->doctor->especialidad}}</td>
        </tr>
        <tr>
            <td><b>Monto: </b></td>
            <td>{{$pago->monto}}</td>
        </tr>
    </table>

    <!--tabla de firmas-->
    <br><br><br>
    <table border="0" style="font-size: 9pt;">
        <tr>
            <td width="210px">
                <p style="text-align: center">
                    __________________________<br>
                    <b>Secretaria</b><br>
                    {{Auth::user()->secretarias->apellido." ".Auth::user()->secretarias->nombres}}
                </p>
            </td>
            <td width="210px"></td>
                 <p style="text-align: center">
                    __________________________<br>
                    <b>Firma paciente</b><br>
                    
                </p>
            <td width="210px"></td>
        </tr>
    </table>


    <!-- ✅ Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>