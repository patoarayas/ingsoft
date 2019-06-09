@extends('layouts.layout')

@section('content')
<script>
  function setInputHiddenonForm(element){
    document.getElementByName('typeSelected')[0].value=element;
  }
</script>

<div class ="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    <a href ="{{route('works.index')}}"class="btn btn-primary  float-left">Volver</a>
                    CREAR ACTIVIDAD DE TITULACIÓN.
                      <div class="card-body">


                        <div class="form-group">
                          <label for="works->title">Título Actividad De Titulación</label>
                          <input type="text" class="form-control" id="title">
                        </div>

                        <div class="form-group" >
                          <label for="nom_enc_lbl2">Profesor Guia</label>
                            <select class="form-control selectpicker" id="academic_1" name="academic_1">
                              @foreach($academics as $academic)
                                <option value="{{$academic->rut}}">{{$academic->rut}} - {{$academic->name}}</option>
                              @endforeach
                            </select>
                        </div>

                        <!--ACA ESTAMOS TRABAJANDO-->
                        <div class="form-group">
                          <label for="nom_enc_lbl1"> Tipo De Actividad </label>
                            <select class="form-control selectpicker" id="tipo" name="type">
                              @foreach($types as $type)
                                <option id ="typeSelected" value="{{$type->max_students}}" data="modal-form-asignar">{{$type->activity_name}}</option>  
                              @endforeach
                            </select>
                        </div>

                        
                        <!--<div class="form-group">
                          <label for="labelCantStudents">Cantidad De Estudiantes</label>
                          <label type="text" class="form-control" id="labelCantStudents"></label>
                        </div>
                      </div>
                </div> -->

                
            </div>
        </div>
    </div>



</div>
@endsection
