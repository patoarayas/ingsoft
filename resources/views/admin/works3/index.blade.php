@extends('layouts.layout')

@section('content')


<div class ="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                <a href ="{{route('home')}}"class="btn btn-primary float-left">Volver</a>
                        REGISTRAR EXAMEN DE TÍTULO
                </div>
                <div class ="card-body text-center">
                    <table class = "table table-striped table-hover" >
                        <thead>

                            <tr>
                                <th with = "10px">ID</th>
                                <th>Título Actividad De Titulación</th>
                                <th>Estado</th>
                                <th colspan="10px">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($works as $work)
                            <tr>
                                <td>{{$work->id}}</td>
                                <td><div>{{$work->title}}</div></td>
                                <td>{{$work->status}}</td>

                                <td with="10px">
                                    <a href="{{route('works3.show',$work->id)}}" class = "btn btn-primary ">Mostrar</a>
                                </td>

                                <td with="10px"> <!-- el edit en controlador works2 , realiza lo de agregar codigo de curricular-->
                                    <a href="{{route('works3.edit',$work->id)}}" class = "btn btn-success">Registrar Examen de título</a>
                                </td>
                               
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $works->render() }}
                </div>
            </div>
        </div>
    </div>

</div>
@endsection