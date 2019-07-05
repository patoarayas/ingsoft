@extends('layouts.layout')

@section('content')


<div class ="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                <a href ="{{route('home')}}"class="btn btn-primary float-left">Volver</a>
                        ACTIVIDAD DE TITULACIÓN
                    <a href ="{{route('works.create')}}"class="btn btn-success float-right">CREAR ACTIVIDAD DE TITULACIÓN</a>
                </div>
                <div class ="card-body text-center">
                    <table class = "table table-striped table-hover" >
                        <thead>

                            <tr>
                                <th with = "10px">ID</th>
                                <th>Título Actidad De Titulación</th>
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

                                <td with="10px"><!-- Mostrar-->
                                <a href="{{route('works.show',$work->id)}}" class = "btn btn-primary "> Mostrar </a>
                                </td>

                                @if($work->status == 'INGRESADA' or $work->status == 'ACEPTADA')
                                <!-- Editar-->
                                <td with="10px">
                                      <a href="{{route('works.edit',$work->id)}}" class = "btn btn-primary"> Editar </a>
                                    </td >

                                    @if($work->status == 'INGRESADA' and auth()->user()->role == 'TITULACION')
                                     <!-- Autorizr-->
                                        <td with="10px">
                                            <a role="button" href="{{route('worksAcademics.edit',$work->id)}}"class = "btn btn-primary">Autorizar</a>
                                        </td >
                                    @endif

                                    <td with="10px"> <!-- el edit en controlador works1 , solo cambia el estado a anulada-->
                                        <a href="{{route('works1.edit',$work->id)}}" onclick ="return ConfirmAnulation()" class = "btn btn-danger">Anular</a>
                                    </td>
                                @endif
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

<script type = "text/javascript">
    function ConfirmAnulation(){
        var answer = confirm("¿Deseas Anular Este Actividad?")
        return answer;
    }
</script>

@endsection
