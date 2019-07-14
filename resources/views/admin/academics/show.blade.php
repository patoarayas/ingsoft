@extends('layouts.layout')

@section('content')
<div class ="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    <a href ="{{route('academics.index')}}"class="btn btn-primary  float-left">Volver</a>
                    ACADEMICO
                </div>
                    <div class ="card-body text-left">
                            <p><strong>Nombre: </strong>{{$academic->name}}</p>
                            <p><strong>Rut: </strong>{{$rutFormateado}}</p>
                            <p><strong>E-mail: </strong>{{$academic->email}}</p>
                            </p>
                    </div>
                </div>
                <!-- aca solo mostramos lo que se recibe como parametro $type y sus atributos-->
            </div>
        </div>
    </div>
</div>
@endsection