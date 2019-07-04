<div class="form-group">
    {{Form::label('title', 'Título')}}
    {{Form::text('title',null,['class' => 'form-control','id'=>'title'])}}
</div>


<div class="form-group">

    {{Form::label('type_id','Seleccione el Tipo de Actividad')}}
        <select class="form-control" name="type_id" id="type_id" onChange="hide()">
            @foreach($types as $type)
                <option value="{{$type->id}}" id="{{$type->max_students}}" title = "{{$type->req_external_org}}">{{$type->activity_name}}</option>
            @endforeach
        </select>
        
</div>

<br>



<div class="form-group">
    <script>
            function myFunction() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                            }
                        }
                    }
            }
    </script>

    <div>
        <span id="notvalid" style="color:red"></span>
    </div>

	<div class="table-responsive-sm">
		<strong>{{ Form::label('students', 'Seleccionar Estudiante(s), ingrese el rut o seleccione dentro de la lista') }}</strong> <br>
            
        <div class="btn-group btn-sm" role="group" aria-label="Basic example">
            <!--<a href="{{ route('students.create') }}" class="btn btn-sm btn-primary">
                                Registrar Estudiante
            </a> -->
            <input class="form-control" type="text" size="25"
            placeholder="Ingrese el rut del estudiante " id="myInput" onkeyup="myFunction()">
        </div>

        <div style="width: 500px; height: 250px; overflow-y: scroll;">
            <table class="table table-sm" id= "myTable">
                <thead>
                    <tr>
                        <th width="10px">RUT</th>
                        <th>Nombre</th>
                        <th colspan="3">&nbsp;</th>
                    </tr>
                </thead>
                    <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{ $student->rut}}</td>
                                <td>{{ $student->name}}</td>
                                <td width="10px">
                                <input name="students" id="students" type="checkbox" value="{{$student->id}}" onclick="return myFun()"></td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>
        </div> 

        <div class="btn btn-primary  float-right">
             <a href="{{route('students.create') }}" class="btn btn-sm btn-primary">
                                Registrar Estudiante
            </a>
        </div>   
    </div>      
</div>

<br>

<div class="form-group">

    <script>
        function myFunction() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput_1");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable_1");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                        }
                    }
                }
        }
    </script>

	<div class="table-responsive-sm">
		<strong>{{ Form::label('academics', 'Seleccionar Profesor(es) Guía(s) (*) ') }}</strong><br>
        <div class="btn-group btn-sm" role="group" aria-label="Basic example">
            
            <input class="form-control" type="text" size="25"
            placeholder="Ingrese el rut del academico " id="myInput_1" onkeyup="myFunction()">
        </div>
		<div style="width: 500px; height: 250px; overflow-y: scroll;">
		<table class="table table-sm"id="myTable_1">
            <thead>
                <tr>
                    <th width="10px">RUT</th>
                    <th>Nombre</th>
                    <th colspan="3">&nbsp;</th>
                </tr>
            </thead>
                <tbody>
                    @foreach($academics as $academic)
                        <tr>
                            <td>{{ $academic->rut}}</td>
                            <td>{{ $academic->name}}</td>
                            <td width="10px"><label>{{ Form::checkbox('academics[]', $academic->id) }}
                            </label></td>
                        </tr>
                    @endforeach
                </tbody>
		</table>
	</div>
    <div class="btn btn-primary  float-right">
             <a href="#" class="btn btn-sm btn-primary">
             Registrar Academico <!-- modificar hreff con academics.create proxima iteracion-->
            </a>
     </div>
        
</div>

<br>
<br>

<div class="form-group">
    <strong>{{Form::label('start_date', 'Fecha de Inicio: ')}}</strong>
    <br>
    <input class ='form-control' type = 'date' id='start_date' name='start_date'>
</div>

<br>

<div class="form-group">
    <strong>{{Form::label('finish_date', 'Fecha de Término: ')}}</strong>
    <br>
    <input class ='form-control' type = 'date' id='finish_date' name='finish_date'>
</div>


 <div class="form-group" id = "organization" style="display:none;" name="organization">

    <strong>{{Form::label('name_ext_org', 'Nombre Organización Externa: ')}}</strong>
    {{Form::text('name_ext_org',null,['class' => 'form-control','id'=>'name_ext_org'])}}

    <strong>{{Form::label('tutor_ext_org','Tutor(*): ')}}</strong>
    {{Form::text('tutor_ext_org',null,['class' => 'form-control','id'=>'tutor_ext_org','value'=>''])}}      
</div>

<br>

<div class="form-group text-center">
    {{
      Form::submit('Guardar Datos',['class'=>'btn btn-success'])
    }}
</div>

<script>
    function hide(){
        var opciones = document.getElementById('type_id').options;
        var seleccion = document.getElementById('type_id').selectedIndex;
        var div = document.getElementById('organization');
        var valor = opciones[seleccion].getAttribute('title');
        var input =document.getElementById('id_type');
        input.value = document.getElementById('type_id').textContent;
        
        
        if(valor == true){

            div.style="";
        }
        else{
            div.style="display:none;";
        } 
    }
</script>

<script>

    function limite(){
        var opciones = document.getElementById('type_id').options;
        var seleccion = document.getElementById('type_id').selectedIndex;
        var limite = opciones[seleccion].id;

        return limite;
    }

</script>

<script>

    function myFun(){
            var a = document.getElementsByName('students');
            var limit= limite();
            var newvar = 0;
            var count;
            for(count=0; count<a.length;count++){
                if(a[count].checked == true){
                    newvar= newvar+1;
                }
            }
            if(newvar>limit){
                document.getElementById('notvalid').innerHTML="Ha excedido la cantidad máxima de alumnos"
                return false;
            }
            else{
                document.getElementById('notvalid').innerHTML= ""
                return true;
            }
        }

</script>