
<div class="form-group">


  {{ Form::label('title','Título De La Actividad De Titulación')}}
  {{  Form::text('title',null, ['class'=>'form-control','id' =>'title','readonly'=>'true']) }}

  {{ Form::label('curricular_code','Có')}}
  {{ Form::text('cant_students',null, ['readonly'=>'true','class'=>'form-control','id' =>'cant_students']) }}
  


  {{ Form::label('start_date','Fecha programada de inicio')}}
  {{Form::date('start_date',null,['class'=>'form-control','id' =>'start_date','value'=>'26-11-1992'])}}

  {{ Form::label('finish_date','Fecha programada de termino')}}
  {{Form::date('finish_date',null,['class'=>'form-control','id' =>'finish_date'])}}

  {{ Form::label('cant_students','Cantidad De Estudiantes')}}
  {{ Form::text('cant_students',null, ['readonly'=>'true','class'=>'form-control','id' =>'cant_students']) }}

  {{ Form::label('year_reg','Año Registro')}}
  <br>
  {{ Form::selectYear('year_reg', 2019, 2019, ['readonly'=>'true','class'=>'form-control','id' =>'year_reg']) }}
  
  <!-- falta seleccionar la id del  tipo de actividad seleccionado--> 
</div>

<div class="form-group text-center">
    {{
      Form::submit('Guardar',['class'=>'btn btn-success'])
    }}
</div>

<!-- Estos 2 forms-group controlan "CREATE" de la actividad de titulacion-->
