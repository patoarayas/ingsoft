@extends('layouts.layout')

@section('content')
<div class ="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    <a href ="{{route('home')}}"class="btn btn-primary float-left">Volver</a>
                    TIPOS DE ACTIVIDAD DE TITULACIÓN
                    <a href ="{{route('types.create' )}}"class="btn btn-success float-right">CREAR TIPO DE ACTIVIDAD</a>
                </div>

                
                <div class ="card-body text-center">
                    <table class = "table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th with = "10px">ID</th>
                                <th>Nombre</th>
                                <th colspan="10px">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($types as $type)
                            <tr>
                                <td>{{$type->id}}</td>
                                <td>{{$type->activity_name}}</td>
                                <td with="10px"><!-- Mostrar-->
                                <a href="{{route('types.show',$type->id)}}" class = "btn btn-primary "> Mostrar </a>
                                </td>
                                <!-- Editar-->
                                <td with="10px">
                                <a href="{{route('types.edit',$type->id)}}" class = "btn btn-primary"> Editar </a>
                                </td >
                                <!-- Eliminar-->
                                <td with ="10px">
                                    <form action="{{ route('types.destroy', $type->id) }}" method="POST">
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <button type="submit" onclick ="return ConfirmDelete()" class="btn btn-danger" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $types->render() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script type = "text/javascript">
    function ConfirmDelete(){
        var answer = confirm("¿Deseas eliminar este tipo de actividad?")
        return answer;
    }
</script>
@endsection