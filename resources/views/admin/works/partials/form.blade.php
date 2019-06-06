<div class="form-group">
  {{ Form::label('title','Título De La Actividad De Titulación')}}
  {{  Form::text('title',null, ['class'=>'form-control','id' =>'title']) }}

  {{ Form::label('type_id','Tipo De Actividad')}}
  {{ Form:: select('id',$types->pluck('activity_name'),null,['class'=>'form-control'])}}

  {{ Form::label('cant_students','Cantidad De Alumnos')}}
 <!-- aqui quedo colgado-->
</div>

<div class="form-group text-center">
    {{
      Form::submit('Guardar',['class'=>'btn btn-primary'])
    }}
</div>
<!-- Estos 2 forms-group controlan "CREATE" de la actividad de titulacion-->