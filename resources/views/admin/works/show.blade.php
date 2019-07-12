@extends('layouts.layout')

@section('content')
<div class ="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    <a href ="{{route('works.index')}}"class="btn btn-primary  float-left">Volver</a>
                    ACTIVIDAD DE TITULACIÓN.
                </div>
                    <div class ="card-body text-left">
                            <p><strong>Título: </strong>{{$work->title}}</p>
                            <p><strong>Estado: </strong>{{$work->status}}</p>
                            <p><strong>Cantidad De Estudiantes: </strong>{{$work->cant_students}}</p>
                            <p><strong>Semestre De Registro: </strong>{{$work->semester_reg}}</p>
                            <p><strong>Fecha De Inicio: </strong>{{$work->start_date}}</p>
                            <p><strong>Fecha De Termino: </strong>{{$work->finish_date}}</p>
                            
                            <p><strong>Año De Ingreso: </strong>{{$work->year_reg}}</p>
                           <!-- <p><strong>Semestre De Ingreso: </strong>{{$work->semester_reg}}</p> -->

                            @if($work->status =='ACEPTADA' ||$work->status =='FINALIZADA' )
                                <p><strong>Codigo Curricular: </strong>{{$work->curricular_code}}</p>
                            @endif

                            @if($work->status =='FINALIZADA')
                                <p><strong>Fecha De Titulación: </strong>{{$work->graduation_date}}</p>
                                <p><strong>Nota: </strong>{{$work->grade}}</p>
                            @endif
                            
                            @foreach($types as $type)
                                <p><strong>Tipo De Actividad: </strong>{{$type->activity_name}}</p>
                            @endforeach

                            @foreach($students as $student)
                                <p><strong>Alumn@: </strong>{{$student->name}}</p>
                            @endforeach
                            
                            <!-- falta mostrar los profesores guias-->
                    </div>
                </div>
                <!-- aca solo mostramos lo que se recibe como parametro $work y sus atributos-->
            </div>
        </div>
    </div>
</div>
@endsection
