@extends('layouts.layout')

@section('content')
<div class ="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    <a href ="{{route('home')}}"class="btn btn-primary float-left">Volver</a>
                    ACADEMICOS
                    <a href ="{{route('academics.create' )}}"class="btn btn-success float-right">CREAR ACADEMICO</a>
                </div>

                <div class='text-center'>
                <button type ="button" class="btn btn-success float-center" onclick="return searchAcademic()" >Buscar Academico</button>
                </div>

                <div class ="card-body text-center">
                    <table class = "table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>RUT</th>

                                <th colspan="10px">&nbsp;</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            @foreach ($academics as $academic)
                            <tr>
                                <td>{{$academic->id}}</td>
                                <td>{{$academic->name}}</td>
                                <td>{{$academic->rut}}</td>
                                <td with="10px"><!-- Mostrar-->
                                <a href="{{route('academics.show',$academic->id)}}" class = "btn btn-primary "> Mostrar </a>
                                </td>
                                <!-- Editar-->
                                <td with="10px">
                                <a href="{{route('academics.edit',$academic->id)}}" class = "btn btn-primary"> Editar </a>
                                </td >
                                <!-- Eliminar-->
                                <td with ="10px">
                                    <form action="{{ route('academics.destroy', $academic->id) }}" method="POST">
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <button type="submit" onclick ="return ConfirmDelete()" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script type = "text/javascript">
    function ConfirmDelete(){
        var answer = confirm("¿Deseas eliminar este académico?")
        return answer;
    }
</script>

<script>
function searchAcademic() {
 
    var search = prompt("Nombre del académico - Rut sin puntos y sin guión");
    if (search != null || search != "") {
        find(search)
    } 
}
</script>
@endsection