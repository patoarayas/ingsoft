@extends('layouts.layout')

@section('content')
<div class ="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    <a href ="{{route('students.index')}}"class="btn btn-primary  float-left">Volver</a>
                    ESTUDIANTE
                </div>
                    <div class ="card-body text-left">
                            <p><strong>Nombre: </strong>{{$student->name}}</p>
                            <p><strong>Rut: </strong>{{$rutFormateado}}</p>
                            <p><strong>E-mail: </strong>{{$student->email}}</p>
                            @if($student->phone != null or $student->phone != "")
                                <p><strong>Teléfono: </strong>{{$student->phone}}</p>
                            @else
                                <p><strong>Teléfono: </strong>No registra teléfono</p>
                            @endif
                            
                            @foreach($careers as $career) <!-- x cada registro selecciono su nombre-->
                            <p><strong>Carrera: {{$career->career}} </strong>
                            @endforeach
                            </p>
                    </div>
                </div>
                <!-- aca solo mostramos lo que se recibe como parametro $type y sus atributos-->
            </div>
        </div>
    </div>
</div>
@endsection