@extends('layouts.layout')

@section('content')
<div class ="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    <a href ="{{route('students.index')}}"class="btn btn-primary  float-left">Volver</a>
                    CREAR ESTUDIANTE
                    <div class ="card-body text-left">
                    
                        <form action="{{route('students.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">NOMBRE</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            
                            <div class="form-group">
                                <label for="rut">RUT</label>
                                <input type="text" class="form-control" id="rut" name="rut">
                            </div>

                            <div class="form-group">
                                <label for="email">E-MAIL</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>

                            <div class="form-group">
                                <label for="phone">TELÉFONO (OPCIONAL)</label>
                                <input type="number" class="form-control" id="phone" name="phone">
                            </div>
                            <div>
                            
                            Carreras:
                            </div>
                            <br>
                            <div class="form-group">
                                 <input type="checkbox" name="career1" value="Ingeniería en Computación e Informática"> Ingeniería en Computación e Informática<br>
                            </div>

                            <div class="form-group">
                                 <input type="checkbox" name="career2" value="Ingeniería Ejecución en Computación e Informática"> Ingeniería Ejecución en Computación e Informática<br>
                            </div>

                            <div class="form-group">
                                 <input type="checkbox" name="career3" value="Ingeniería Civil en Computación e Informática (Malla-Nueva)"> Ingeniería Civil en Computación e Informática (Malla-Nueva)<br>
                            </div>

                            <div class="form-group">
                                 <input type="checkbox" name="career4" value="Ingeniería Civil en Computación e Informática (Malla-Antigua)"> Ingeniería Civil en Computación e Informática (Malla-Antigua)<br>
                            </div>

                            <button type="submit" class="btn btn-success">Crear Estudiante</button>                        
                        
                        </form>
                    </div>
                </div>
                <!-- aca hacemos el llamado al form que se encargara de recibir los datos y guardarlos-->
            </div>
        </div>
    </div>
</div>


@endsection