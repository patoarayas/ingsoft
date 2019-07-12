@extends('layouts.layout')

@section('content')
<div class ="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    <a href ="{{route('home')}}"class="btn btn-primary float-left">Volver</a>
                    ESTUDIANTES
                    <a href ="{{route('students.create' )}}"class="btn btn-success float-right">CREAR ESTUDIANTE</a>
                </div>

                <div class='text-center'>
                <button type ="button" class="btn btn-success float-center" onclick="return searchStudent()" >Buscar Estudiante</button>
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
                            @foreach ($students as $student)
                            <tr>
                                <td>{{$student->id}}</td>
                                <td>{{$student->name}}</td>
                                <td>{{$student->rut}}</td>
                                <td with="10px"><!-- Mostrar-->
                                <a href="{{route('students.show',$student->id)}}" class = "btn btn-primary "> Mostrar </a>
                                </td>
                                <!-- Editar-->
                                <td with="10px">
                                <a href="{{route('students.edit',$student->id)}}" class = "btn btn-primary"> Editar </a>
                                </td >
                                <!-- Eliminar-->
                                <td with ="10px">
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST">
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
        var answer = confirm("¿Deseas eliminar este estudiante?")
        return answer;
    }
</script>

<script>
function searchStudent() {
 
    var search = prompt("Nombre del estudiante - Rut sin puntos y sin guión");
    if (search != null || search != "") {
        find(search)
    } 
}
</script>
@endsection