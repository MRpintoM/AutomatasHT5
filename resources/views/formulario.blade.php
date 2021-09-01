@extends('layouts.plantilla')

@section('content')
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Registrarse
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Formulario de Registro </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?php
                // EXPRESIONES REGULARES

                $saludo = "AL SISTEMA DE EXPRESIONES REGULARES";

                $regex = "/^[a-zñ\sA-ZÑ\d]+$/";
                if (isset($_POST['btnEnviar'])) {
                    if (preg_match($regex, $_POST['texto'])) {
                        $resultado = "<span style='color:green'>✓</span>";
                        $str = preg_replace('/[\s]+/', "", $_POST['texto']);
                        echo $str;
                    } else {
                        $resultado = "<span style='color:red'>✗</span>";
                    }
                }

                ?>


                <form method="POST">


                    <div class="row">
                        <div class="col-6 offset-3">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="nombre" class="form-control" placeholder="Ingresa tu Nombre"  >
                            <!-- <?php if(isset($regex)) {echo '&nbsp;'.$regex.'';} ?> -->
                                <?php if(isset($resultado)) {echo '&nbsp;'.$resultado.'';} ?>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 offset-3">
                            <div class="form-group">
                                <label>Apellido</label>
                                <input type="text" name="apellido" class="form-control" placeholder="Ingresa tu Apellido" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 offset-3">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="correo" id="correo" placeholder="Ingresa tu Correo" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" >

                        <button type="submit" name="btnEnviar" class="btn btn-primary">Suscribirse</button>
                    </div>
                </form>
            </div>
    </div>



@endsection



