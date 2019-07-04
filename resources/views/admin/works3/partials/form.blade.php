
<div class="form-group">
{{ Form::label('grade','Nota')}}
{{ Form::number('grade',null, ['class'=>'form-control','id' =>'grade','step'=>'any' , 'min'=>'1', 'max'=>'7']) }}

{{ Form::label('graduation_date','Fecha examen de título')}}
{{ Form::date('graduation_date',null, ['class'=>'form-control','id' =>'graduation_date']) }}

{{ Form::label('title','Título De La Actividad De Titulación')}}
{{  Form::text('title',null, ['class'=>'form-control','id' =>'title','readonly'=>'true',]) }}

{{ Form::label('status','Estado De La Actividad')}}
{{ Form::text('status',null, ['class'=>'form-control','id' =>'status','readonly' => 'true']) }}

{{ Form::label('start_date','Fecha programada de inicio')}}
{{Form::date('start_date',null,['class'=>'form-control','id' =>'start_date','readonly' => 'true'])}}

{{ Form::label('finish_date','Fecha programada de termino')}}
{{Form::date('finish_date',null,['class'=>'form-control','id' =>'finish_date','readonly' => 'true'])}}

{{ Form::label('year_reg','Año Registro: ')}}
{{ Form::text('year_reg',null,['class'=>'form-control','id'=>'year_reg','readonly' => 'true']) }}

{{ Form::label('cant_students','Cantidad De Estudiantes')}}
{{ Form::text('cant_students',null, ['readonly'=>'true','class'=>'form-control','id' =>'cant_students']) }}

{{ Form::label('semester_reg','Semestre Registro: ')}}
{{ Form::text('semester_reg',null,['class'=>'form-control','id'=>'semester_reg','readonly' => 'true']) }}

</div>

<div class="form-group text-center">
  {{
    Form::submit('Registrar Examen',['class'=>'btn btn-success'])
  }}
</div>