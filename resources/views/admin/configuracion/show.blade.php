@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Datos de la configuración</h1>
</div>

<hr>
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Datos registrados</h3>
            </div>
            <!--cuerpo del formulario-->
            <div class="card-body">

                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">

                                <!--campo nombre-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nombre del hospital/clínica</label>
                                        <p>{{$configuracion->nombre}}</p>
                                    </div>
                                </div>

                                <!--campo direccion-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Dirección</label>
                                        <p>{{$configuracion->direccion}}</p>
                                    </div>
                                </div>

                            </div>

                            <br>

                            <div class="row">

                                <!--campo telefono-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Teléfono</label>
                                        <p>{{$configuracion->telefono}}</p>
                                    </div>
                                </div>

                                <!--campo correo-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Correo electrónico</label>
                                        <p>{{$configuracion->correo}}</p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Logotipo</label>
                                <br>
                                <img style="text-align:center;" src="{{asset('storage/'.$configuracion->logo)}}" alt="logo" width="100px">
                                <br>

                                <!--script para previsualizar la imagen del logo antes de cargarlo-->
                                <center><output id="list"</output></center>
                                <script>
                                    function archivo(evt){
                                        var files = evt.target.files; //FileList object
                                        //Obtenemos la imagen del campo "file"
                                        for(var i = 0; f = files[i]; i++){
                                            //solo se admiten imágenes
                                            if(!f.type.match('image.*')){
                                                continue;
                                            }

                                            var reader = new FileReader();
                                            reader.onload = (function (theFile){
                                                return function (e){
                                                    //se inserta la imagen
                                                    document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="',e.target.result, '" width="70%" title="', escape(theFile.name), '"/>'].join('');
                                                };
                                            })(f);
                                            reader.readAsDataURL(f);
                                        }
                                        
                                    }
                                    document.getElementById('file').addEventListener('change', archivo, false);
                                </script>

                            </div>
                        </div>
                    </div>


                    <hr>

                    <!--botón de verificación-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('admin/configuracion')}}" class="btn btn-secondary">Volver</a>
                            </div>
                        </div>
                    </div>
                    <hr>

            </div>
        </div>
    </div>
</div>
@endsection