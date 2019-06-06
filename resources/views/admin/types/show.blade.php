@extends('layouts.layout')

@section('content')
<div class ="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    <a href ="{{route('types.index')}}"class="btn btn-primary  float-left">Volver</a>
                    MOSTRAR TIPO DE ACTIVIDAD DE TITULACIÓN.
                </div>
                    <div class ="card-body text-left">
                            <p><strong>Nombre: </strong>{{$type->activity_name}}</p>
                            <p><strong>Cantidad De Alumnos: </strong>{{$type->max_students}}</p>
                            <p><strong>Duración (Semestres): </strong>{{$type->duration}}</p>
                            @if($type->req_external_org)
                                <p><strong>Requiere Organización Externa: </strong>SI</p>
                            @else
                                <p><strong>Requiere Organización Externa: </strong>NO</p>
                            @endif
                    </div>
                </div>
                <!-- aca solo mostramos lo que se recibe como parametro $type y sus atributos-->
            </div>
        </div>
    </div>
</div>
@endsection