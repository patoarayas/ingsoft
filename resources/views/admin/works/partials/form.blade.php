<!-- Este es el form usado para editar un trabajo -->

<div class="form-group">

  {{ Form::label('title','Título De La Actividad De Titulación')}}
  {{  Form::text('title',null, ['class'=>'form-control','id' =>'title']) }}

  {{ Form::label('status','Estado De La Actividad')}}
  {{  Form::text('status',null, ['class'=>'form-control','id' =>'status','readonly' => 'true']) }}

  {{ Form::label('type_id','Tipo De Actividad')}}
  {{ Form:: select('id',$types->pluck('activity_name'),$type->id-1,['class'=>'form-control','readonly'=>'true'])}}

  {{ Form::label('semester_reg','Semestre Registro: ')}}
  {{ Form::text('semester_reg',null,['class'=>'form-control','id'=>'semester_reg','readonly' => 'true']) }}

  {{ Form::label('year_reg','Año Registro: ')}}
  {{ Form::text('year_reg',null,['class'=>'form-control','id'=>'year_reg','readonly' => 'true']) }}

  {{ Form::label('start_date','Fecha programada de inicio')}}
  {{Form::date('start_date',null,['class'=>'form-control','id' =>'start_date','onChange'=>'setFechaMinima()'])}}

  {{ Form::label('finish_date','Fecha programada de termino')}}
  {{Form::date('finish_date',null,['class'=>'form-control','min'=>$work->start_date,'id' =>'finish_date'])}}

  {{ Form::label('cant_students','Cantidad De Estudiantes')}}
  {{ Form::text('cant_students',null, ['readonly'=>'true','class'=>'form-control','id' =>'cant_students']) }}
<br>
<div class="form-group">
    <!-- Permite modificar la organización y el nombre del tutor si la ctividad asi lo requiere -->
    @if ($type->req_external_org)
        {{Form::label('name_ext_org', 'Nombre Organización Externa: ')}}
        {{Form::text('name_ext_org',$work->name_ext_org,['class' => 'form-control','id'=>'name_ext_org'])}}
        <br>
        {{Form::label('tutor_ext_org','Tutor(a): ')}}
        {{Form::text('tutor_ext_org',$work->tutor_ext_org,['class' => 'form-control','id'=>'tutor_ext_org','value'=>''])}}
    @endif
</div>

<div>
    <!-- PERMITE MODIFICAR LA COMISION  CORRECTORA -->
    @if ($work->status == 'ACEPTADA')
        <p>Comisión correctora:</p>

        <div hidden id= "alert" class= "alert alert-danger">
            <p>"¡No puede seleccionar dos veces el mismo académico!"</p>
        </div>
        <div hidden id= "alert2" class= "alert alert-danger">
            <p>"¡Solo puede haber 2 profesores guias!"</p>
        </div>

        @for ($i=0; $i < 3-$type->req_external_org; $i++)
            @if ($i < $guides->count())
                <div class = "form-group">
                {{ Form::label('name[]','Académico:')}}
                {{ Form::select('name[]',$academics->pluck('name','id'), $guides[$i]->id, ['class'=>'form-control','id' =>'name'.$i,'onChange'=>'isUnique(this)','placeholder'=>'Seleccione un académico...']) }}
                {{ Form::select('role[]',['GUIA'=>'GUIA','CORRECTOR'=>'CORRECTOR'],$guides[$i]->pivot->academic_role, ['class'=>'form-control','id' =>'role'.$i,'onChange'=>'checkGuides(this)','placeholder'=>'Seleccione el rol...']) }}
                </div>
            @else
                <div class = "form-group">
                {{ Form::label('name[]','Académico:')}}
                {{ Form::select('name[]',$academics->pluck('name','id'), null, ['class'=>'form-control','id' =>'name'.$i,'onChange'=>'isUnique(this)','placeholder'=>'Seleccione un académico...']) }}
                {{ Form::select('role[]',['GUIA'=>'GUIA','CORRECTOR'=>'CORRECTOR'],null, ['class'=>'form-control','id' =>'role'.$i,'onChange'=>'checkGuides(this)','placeholder'=>'Seleccione el rol...']) }}
                </div>
            @endif
        @endfor

    @endif
</div>

<div>
   <!-- Muestra el codigo curricular si la actividad posee uno -->
    @if ($work->status == 'ACEPTADA' && $work->curricular_code != NULL)
        {{ Form::label('curricular_code','Codigo curricular')}}
        {{ Form::text('curricular_code',null,['class'=>'form-control','id'=>'curricular_code','readonly' => 'true']) }}
    @endif

</div>

<div>
    <!-- ESTE IF NO SE PUEDE ACCEDER -->
    <!-- Muestra fecha de graduacion y nota si la actividad esta FINALIZADA -->
    @if ($work->status == 'FINALIZADA')
        {{ Form::label('grade','Calificación')}}
        {{ Form::number('grade',null,['class'=>'form-control','step'=>'any','min'=>'1','max'=>'7','id' =>'grade'])}}

        {{ Form::label('graduation_date','Fecha De Titulacíon')}}
        {{Form::date('graduation_date',null,['class'=>'form-control','id' =>'graduation_date'])}}
    @endif
</div>

<div class="form-group text-center">
    {{
      Form::submit('Guardar',['class'=>'btn btn-success'])
    }}
</div>

<script>
    function setFechaMinima(){
        var start_date = document.getElementById('start_date').value;
        console.log(start_date);
        var finish_date = document.getElementById('finish_date');
        finish_date.min = start_date;
    }

    function isUnique(seleccion){

        if(document.getElementById('alert').hidden == false){
            document.getElementById('alert').hidden = true;
        }

        var academicos= [];
        for(var i=0;i<3-{{$type->req_external_org}};i++){
            academicos[i] = document.getElementById('name'+i);
        }

        var coincidencias = academicos.filter(function(item){
            return item.value == seleccion.value;
        })

        if(coincidencias.length > 1){
            document.getElementById('alert').hidden = false;
            seleccion.value = "";
        }


    }

    function checkGuides(seleccion){

        if(document.getElementById('alert2').hidden == false){
            document.getElementById('alert2').hidden = true;
        }

        var roles = [];
        for (var i = 0; i<3-{{$type->req_external_org}};i++){
            roles[i] = document.getElementById('role'+i);

        }

        var coincidencias = roles.filter(function(item){


            return item.value == seleccion.value;
        })

        if(coincidencias.length>2){
            document.getElementById('alert2').hidden = false;
            seleccion.value = "";
        }

    }
</script>
