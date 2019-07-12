<div class="form-group">
{{ Form::label('activity_name','Nombre Del Tipo De Actividad')}}  
    {{  Form::text('activity_name',null, ['class'=>'form-control','id' =>'activity_name']) }}

    {{ Form::label('max_students','Cantidad De Estudiantes Permitidos')}}
    {{ Form::select('max_students',[1 =>'1',2=>'2',3=>'3',4=>'4'],null,['class'=>'form-control','id'=>'max_students']) }}
    
    {{ Form::label('duration','Duración (Semetres)')}}
    {{ Form::select('duration',[1 =>'1',2=>'2',3=>'3',4=>'4'],null,['class'=>'form-control','id'=>'duration']) }}

    {{ Form::label('req_external_org','Requiere Organización Externa')}}
    {{ Form::select('req_external_org',[1=>'SI',0=>'NO'],null,['class'=>'form-control','id'=>'req_external_org']) }}
    
    

</div>

<div class="form-group text-center">
    {{
      Form::submit('Guardar',['class'=>'btn btn-success'])
    }}
</div>
<!-- Estos 2 forms-group controlan "CREATE" del tipo de actividad de titulacion-->