
<!-- Este es el form usado para crear el trabajo -->

<!-- TITULO -->
<div class="form-group">
    {{Form::label('title', 'Título')}}
    {{Form::text('title',null,['class' => 'form-control','id'=>'title'])}}
</div>

<!-- TIPO DE ACTIVIDAD -->
<div class="form-group">

    <!-- Este div guarda los datos de los tipos bajo el id "type_select" -->
    <div hidden class="form-group">
            <select class="form-control" name="type_select" id="type_select" >
                @foreach($types as $type)
                    <option value="{{$type->req_external_org}}" id="{{$type->max_students}}" title = "{{$type->activity_name}}">{{$type->activity_name}}
                    {{session(['id'=>$type->id])}}
                    </option>
                @endforeach
            </select>
    </div>
    <!-- Este es el verdadero form -->
    {{Form::label('type_id','Seleccione el Tipo de Actividad')}}
    {{Form:: select('type_id',$types->pluck('activity_name','id'),null,['id'=>'type_id','class'=>'form-control','onChange'=>'hide()'])}}

</div>
<br>

<!-- SELECCIONAR ESTUDIANTES -->
<div class="form-group">


    <div>
        <span id="notvalid" style="color:red"></span>
    </div>

	<div class="table-responsive-sm">
		<strong>{{ Form::label('students', 'Seleccionar Estudiante(s), ingrese el rut o seleccione dentro de la lista') }}</strong> <br>

        <div class="btn-group btn-sm" role="group" aria-label="Basic example">

            <input class="form-control" type="text" size="25"
            placeholder="Ingrese el rut del estudiante " id="myInput" onkeyup="filtrarEstudiantePorRut()">
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

                                <td width="50px">
                                <input name="students[]" id="students" type="checkbox" value="{{$student->id}}" onclick="return checkMaxStudents()"></td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>

        <br>
        <div class="btn btn-primary  float-right">
             <a href="{{route('students.create') }}" class="btn btn-sm btn-primary">
                                Registrar Estudiante
            </a>
        </div>
    </div>
</div>
<br>

<!-- SELECCIONAR ACADEMICOS GUIAS -->
<div class="form-group">

    <div>
        <span id="notvalid2" style="color:red"></span>
    </div>

	<div class="table-responsive-sm">
		<strong>{{ Form::label('academics', 'Seleccionar Profesor(es) Guía(s) (*) ') }}</strong><br>
        <div class="btn-group btn-sm" role="group" aria-label="Basic example">
            <input class="form-control" type="text" size="25"
            placeholder="Ingrese el rut del academico " id="myInput_1" onkeyup="filtrarAcademicoPorRut()">
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
                            <td width="50px"><label>{{ Form::checkbox('academics[]', $academic->id,null,['onClick'=>'return checkMaxAcademics()'])}}
                            </label></td>
                        </tr>
                    @endforeach
                </tbody>
		</table>
	</div>
    <br>
    <div class="btn btn-primary  float-right">

             <a href="{{route('academics.create')}}" class="btn btn-sm btn-primary">
             Registrar Academico
            </a>
     </div>

</div>
<br>
<br>

<!-- SELECCIONAR FECHAS DE INICIO Y TERMINO-->
<div class="form-group">
    <strong>{{Form::label('start_date', 'Fecha de Inicio: ')}}</strong>
    <br>
    <input class ='form-control' type = 'date' id='start_date' name='start_date' onchange="setFechaMinima()">
</div>

<br>

<div class="form-group">
    <strong>{{Form::label('finish_date', 'Fecha de Término: ')}}</strong>
    <br>
    <input class ='form-control' type = 'date' id='finish_date' name='finish_date' >
</div>

<!-- SELECCIONAR ORGANIZACION EXTERNA -->
 <div class="form-group" id = "organization" style="display:none;" name="organization">

    <strong>{{Form::label('name_ext_org', 'Nombre Organización Externa: ')}}</strong>
    {{Form::text('name_ext_org',null,['class' => 'form-control','id'=>'name_ext_org'])}}

    <strong>{{Form::label('tutor_ext_org','Tutor(*): ')}}</strong>
    {{Form::text('tutor_ext_org',null,['class' => 'form-control','id'=>'tutor_ext_org','value'=>''])}}
</div>

<br>
<!-- Enviar FORM -->
<div class="form-group text-center">
    {{

      Form::submit('Guardar Datos',['class'=>'btn btn-success'])
    }}
</div>

<!-- Scripts -->
<script>
    function hide(){
        // Esta funcion ve si la actividad requiere de organizacion ext y despliega
        // los campos necesarios para rellenarla
        var opciones = document.getElementById('type_select').options;

        var seleccion = document.getElementById('type_id').selectedIndex;

        var div = document.getElementById('organization');

        var valor = opciones[seleccion].value;

        if(valor==true){

            div.style="";
        }
        else{
            div.style="display:none;";
        }
    }


    function limite(){
        // Esta funcion retorna la cantidad max de alumnos permitidos
        var opciones = document.getElementById('type_select').options;

        var seleccion = document.getElementById('type_id').selectedIndex;

        var limite = opciones[seleccion].id;

        //console.log("El limite de estudiantes es:"+limite);
        return limite;
    }



    function checkMaxStudents(){
            // Esta función controla si la cantidad de alumnos esta dentro de lo permitido
            var a = document.getElementsByName('students[]');
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


    function checkMaxAcademics(){
        var cant = document.getElementsByName('academics[]');
        var cont = 0;
        for(var i = 0; i<cant.length;i++){
            if(cant[i].checked){
                cont++;
            }
        }
        if(cont>2){
            document.getElementById('notvalid2').innerHTML="Puede seleccionar 2 profesores guias como máximo";
            return false;
        }
        else{
            document.getElementById('notvalid2').innerHTML= "";
            return true;
        }

    }

    function setFechaMinima(){
        var start_date = document.getElementById('start_date').value;
        console.log(start_date);
        var finish_date = document.getElementById('finish_date');
        finish_date.min = start_date;
    }

    function filtrarAcademicoPorRut() {
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

    function filtrarEstudiantePorRut() {
    // Permite buscar por rut
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
