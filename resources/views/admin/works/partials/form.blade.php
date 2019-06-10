<div class="form-group">
  {{ Form::label('title','Título De La Actividad De Titulación')}}
  {{  Form::text('title',null, ['class'=>'form-control','id' =>'title']) }}

  {{ Form::label('status','Estado De La Actividad')}}
  {{  Form::text('status',null, ['class'=>'form-control','id' =>'status','readonly' => 'true']) }}

  {{ Form::label('type_id','Tipo De Actividad')}}
  {{ Form:: select('id',$types->pluck('activity_name'),null,['class'=>'form-control'])}}

  {{ Form::label('semester_reg','Semestre Regitstro: ')}}
  {{ Form::text('semester_reg',null,['class'=>'form-control','id'=>'semester_reg','readonly' => 'true']) }}
  
  {{ Form::label('year_reg','Año Registro: ')}}
  {{ Form::text('year_reg',null,['class'=>'form-control','id'=>'year_reg','readonly' => 'true']) }}

  {{ Form::label('start_date','Fecha Inicio')}}
  {{Form::date('start_date',null,['class'=>'form-control','id' =>'start_date'])}}

  {{ Form::label('finish_date','Fecha Inicio')}}
  {{Form::date('finish_date',null,['class'=>'form-control','id' =>'finish_date'])}}

  {{ Form::label('cant_students','Cantidad De Estudiantes')}}
  {{ Form::text('cant_students',null, ['readonly'=>'true','class'=>'form-control','id' =>'cant_students']) }}

  {{ Form::label('grade','Calificación')}}
  {{ Form::number('grade',null,['class'=>'form-control','id' =>'cant_students'])}}

  {{ Form::label('graduation_date','Fecha De Titulacíon')}}
  {{Form::date('graduation_date',null,['class'=>'form-control','id' =>'graduation_date'])}}
 
  
 <!-- aqui quedo colgado-->
</div>

<div class="form-group text-center">
    {{
      Form::submit('Guardar',['class'=>'btn btn-success'])
    }}
</div>
<!-- Estos 2 forms-group controlan "CREATE" de la actividad de titulacion-->
