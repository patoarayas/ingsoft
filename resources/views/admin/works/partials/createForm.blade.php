
<div class="form-group">


  {{ Form::label('title','Título De La Actividad De Titulación')}}
  {{  Form::text('title',null, ['class'=>'form-control','id' =>'title']) }}

  {{ Form::label('type_id','Tipo De Actividad')}}
  {{ Form:: select('type_id',$types->pluck('activity_name'),null,['id'=>'type_id','class'=>'form-control'])}}


  {{ Form::label('start_date','Fecha programada de inicio')}}
  {{Form::date('start_date',null,['class'=>'form-control','id' =>'start_date','value'=>'26-11-1992'])}}

  {{ Form::label('finish_date','Fecha programada de termino')}}
  {{Form::date('finish_date',null,['class'=>'form-control','id' =>'finish_date'])}}



</div>

<div class="form-group text-center">
    {{
      Form::submit('Guardar',['class'=>'btn btn-success'])
    }}
</div>

<!-- Estos 2 forms-group controlan "CREATE" de la actividad de titulacion-->
