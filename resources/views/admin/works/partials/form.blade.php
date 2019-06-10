<div class="form-group">
  {{ Form::label('title','Título De La Actividad De Titulación')}}
  {{  Form::text('title',null, ['class'=>'form-control','id' =>'title']) }}

  {{ Form::label('status','Estado De La Actividad')}}
  {{  Form::text('status',null, ['class'=>'form-control','id' =>'status','readonly' => 'true']) }}

  {{ Form::label('type_id','Tipo De Actividad')}}
  {{ Form:: select('id',$types->pluck('activity_name'),null,['class'=>'form-control'])}}

  {{ Form::label('semester_reg','Semestre Registro: ')}}
  {{ Form::text('semester_reg',null,['class'=>'form-control','id'=>'semester_reg','readonly' => 'true']) }}

  {{ Form::label('year_reg','Año Registro: ')}}
  {{ Form::text('year_reg',null,['class'=>'form-control','id'=>'year_reg','readonly' => 'true']) }}

  {{ Form::label('start_date','Fecha programada de inicio')}}
  {{Form::date('start_date',null,['class'=>'form-control','id' =>'start_date'])}}

  {{ Form::label('finish_date','Fecha programada de termino')}}
  {{Form::date('finish_date',null,['class'=>'form-control','min'=>$work->start_date,'id' =>'finish_date'])}}

  {{ Form::label('cant_students','Cantidad De Estudiantes')}}
  {{ Form::text('cant_students',null, ['readonly'=>'true','class'=>'form-control','id' =>'cant_students']) }}

  <!-- Solo mostrar nota y fecha de graduacion si status corresponde a FINALIZADA -->
    <!-- Si la actividad esta FINALIZADA permitir modificar los campos -->
    @if ($work->status == 'FINALIZADA')
        {{ Form::label('grade','Calificación')}}
        {{ Form::number('grade',null,['class'=>'form-control','step'=>'any','min'=>'1','max'=>'7','id' =>'grade'])}}

        {{ Form::label('graduation_date','Fecha De Titulacíon')}}
         {{Form::date('graduation_date',null,['class'=>'form-control','id' =>'graduation_date'])}}
    @endif
    @if ($work->status == 'ACEPTADA' && $work->curricular_code != NULL)
        {{ Form::label('curricular_code','Codigo curricular')}}
         {{ Form::text('curricular_code',null,['class'=>'form-control','id'=>'curricular_code','readonly' => 'true']) }}

    @endif



 <!-- aqui quedo colgado-->
</div>

<div class="form-group text-center">
    {{
      Form::submit('Guardar',['class'=>'btn btn-success'])
    }}
</div>
<!-- Estos 2 forms-group controlan "CREATE" de la actividad de titulacion-->
