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
                            <p><strong>Fecha De Inicio: </strong>{{$work->start_date}}</p>
                            <p><strong>Fecha De Termino: </strong>{{$work->start_finish}}</p>
                            <p><strong>Año De Ingreso: </strong>{{$work->year_reg}}</p>
                            <p><strong>Semestre De Ingreso: </strong>{{$work->semester_reg}}</p>
                            
                            @if($work->status =='ACEPTADA' ||$work->status =='FINALIZADA' )
                                <p><strong>Codigo Curricular: </strong>{{$work->curricular_code}}</p>
                            @endif

                            @if($work->status =='FINALIZADA')
                                <p><strong>Fecha De Titulación: </strong>{{$work->graduation_date}}</p>
                                <p><strong>Nota: </strong>{{$work->grade}}</p>
                            @endif
                            
                            @foreach($types as $type)

                                @if($work->type_id == $type->id)
                                    <p><strong>Tipo De Actividad: </strong>{{$type->activity_name}}</p>
                               
                                    @if($type->req_external_org)
                                    <p><strong>Organización Externa: </strong>{{$work->name_ext_org}}</p>
                                    <p><strong>Tutor Organización Externa: </strong>{{$work->tutor_ext_org}}</p>

                                    @endif

                                @endif
                            @endforeach

                            
                    </div>
                </div>
                <!-- aca solo mostramos lo que se recibe como parametro $work y sus atributos-->
            </div>
        </div>
    </div>
</div>
@endsection

