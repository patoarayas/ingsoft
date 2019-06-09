@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Menú</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth()->user()->role == 'SECRETARIA' or Auth()->user()->role == 'TITULACION')
                      <button type="button" class="btn btn-primary btn-lg btn-block">Registrar Academicos</button>
                      <button type="button" class="btn btn-primary btn-lg btn-block">Registrar Estudiantes</button>
                      <a href ="{{route('types.index')}}" class="btn btn-primary btn-lg btn-block">Administrar Tipo De Actividad De Titulación</a>
                      <a href ="{{route('works.index')}}" class="btn btn-primary btn-lg btn-block">Administrar Actividad De Titulación</a>
                      <button type="button" class="btn btn-primary btn-lg btn-block">Registrar Inscripción Formal</button>
                      <button type="button" class="btn btn-primary btn-lg btn-block">Registrar Examen de Título</button>
                      <button type="button" class="btn btn-primary btn-lg btn-block">Consultar Actividades De Titulación Vigentes</button>

                    @else<!-- solo queda academico-->
                      <button type="button" class="btn btn-primary btn-lg btn-block">Consultar Actividades De Titulación Vigentes</button>
                    @endif



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
