
<div class="form-group">
{{ Form::label('name1','Miembro 1')}}
{{ Form::select('name1',$academics->pluck('name','id'), null, ['class'=>'form-control','id' =>'name']) }}
{{ Form::label('academic_role1','Rol del Miembro 1')}}
{{ Form::select('academic_role1',['GUIA'=>'GUIA','CORRECTOR'=>'CORRECTOR'],['class'=>'form-control','id' =>'academic_role']) }}

</div>

@if (!$type->req_external_org)

    {{ Form::label('name2','Miembro 2')}}
    {{ Form::select('name2',$academics->pluck('name','id'), null, ['class'=>'form-control','id' =>'name']) }}
    {{ Form::label('academic_role2','Rol del Miembro 2')}}
    {{ Form::select('academic_role2',['GUIA'=>'GUIA','CORRECTOR'=>'CORRECTOR'], ['class'=>'form-control','id' =>'academic_role']) }}
@else

<p>La comisión correctora además estara constituida por:</p>
<p>Tutor organización externa: {{$work->tutor_ext_org}}</p>

@endif
<p>Profesor



<div class="form-group text-center">
  {{
    Form::submit('Registrar Miembros',['class'=>'btn btn-success'])
  }}
</div>
