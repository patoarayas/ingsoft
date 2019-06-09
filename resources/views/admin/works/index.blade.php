@extends('layouts.layout')

@section('content')
<script type="text/javascript">
function countStudens() {
    var max = document.getElementById("typeSelected").htmlFor;
    document.getElementById("labelCantStudents").innerHTML = max;

}
</script>
<div class ="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                <a href ="{{route('home')}}"class="btn btn-primary float-left">Volver</a>
                        ACTIVIDAD DE TITULACIÓN
                    <a href ="{{route('works.create')}}"class="btn btn-primary float-right">CREAR ACTIVIDAD DE TITULACIÓN</a>
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
                                <td>{{$work->title}}</td>
                                <td>{{$work->status}}</td>

                                <td with="10px"><!-- Mostrar-->
                                <a href="{{route('works.show',$work->id)}}" class = "btn btn-primary "> Mostrar </a>
                                </td>

                                @if($work->status == 'INGRESADA')
                                    <!-- Editar-->
                                    <td with="10px">
                                      <a href="{{route('works.edit',$work->id)}}" class = "btn btn-primary"> Editar </a>
                                    </td >

                                    @if(auth()->user()->role == 'TITULACION')
                                     <!-- Autorizr-->
                                        <td with="10px">
                                            <a href="#" class = "btn btn-primary">Autorizar</a>
                                        </td >
                                    @endif

                                @endif

                                @if($work->status == 'INGRESADA' or $work->status == 'ACEPTADA')
                                    <td with="10px">
                                        <a href="" class = "btn btn-danger">Anular</a>
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

@endsection
