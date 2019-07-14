@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Menú</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth()->user()->role == 'SECRETARIA' or Auth()->user()->role == 'TITULACION')
                      <a href ="{{route('academics.index')}}" class="btn btn-primary btn-medium btn-block">Administrar Academicos</a>
                      <a href ="{{route('students.index')}}" class="btn btn-primary btn-medium btn-block">Administrar Estudiantes</a>
                      <a href ="{{route('types.index')}}" class="btn btn-primary btn-medium btn-block">Administrar Tipo De Actividad De Titulación</a>
                      <a href ="{{route('works.index')}}" class="btn btn-primary btn-medium btn-block">Administrar Actividad De Titulación</a>
                      <a href ="{{route('works2.index')}}" class="btn btn-primary btn-medium btn-block">Registrar Inscripción Formal</a>
                      <a href ="{{route('works3.index')}}" class="btn btn-primary btn-medium btn-block">Registrar Examen de Título</a>

                      <!--<a href ="{{route('worksAcademics.index')}}" class="btn btn-primary btn-medium btn-block">Autorizar actividad de Titulación</a>-->

                      <button type="button" class="btn btn-primary btn-medium btn-block">Consultar Actividades De Titulación Vigentes</button>

                    @else<!-- solo queda academico-->
                      <button type="button" class="btn btn-primary btn-medium btn-block">Consultar Actividades De Titulación Vigentes</button>
                    @endif



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
