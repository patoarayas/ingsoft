@extends('layouts.layout')

@section('content')
<div class ="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    <a href ="{{route('academics.index')}}"class="btn btn-primary  float-left">Volver</a>
                    CREAR ACADEMICO
                    <div class ="card-body text-left">
                    
                        <form action="{{route('academics.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">NOMBRE</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            
                            <div class="form-group">
                                <label for="rut">RUT</label>
                                <input type="text" class="form-control" id="rut" name="rut">
                            </div>

                            <div class="form-group">
                                <label for="email">E-MAIL</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success">Crear Academico</button>                        
                        
                        </form>
                    </div>
                </div>
                <!-- aca hacemos el llamado al form que se encargara de recibir los datos y guardarlos-->
            </div>
        </div>
    </div>
</div>


@endsection