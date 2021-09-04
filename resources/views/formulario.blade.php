@extends('layouts.plantilla')

@section('content')
    <div class="p-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif

        @if(\Session::has('warning'))
            <div class="alert alert-warning">
                <ul>
                    <li>{!! \Session::get('warning') !!}</li>
                </ul>
            </div>
    @endif

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
        Registrarse
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"style="background:-webkit-linear-gradient(left top,#E430FD  ,#45B39D);">
                    <h5 class="modal-title" style="align-content: center" id="exampleModalLabel">Formulario de Registro </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>




                <form action="{{route('save')}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-6 offset-3">
                            <div class="form-group">
                                <label>Nombre (requerido)</label>
                                <input type="text" name="nombre" class="form-control" placeholder="Ingresa tu Nombre"  >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 offset-3">
                            <div class="form-group">
                                <label>Apellido (requerido)</label>
                                <input type="text" name="apellido" class="form-control" placeholder="Ingresa tu Apellido" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 offset-3">
                            <div class="form-group">
                                <label>Email (requerido)</label>
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



