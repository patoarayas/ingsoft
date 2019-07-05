
<div class="form-group">
{{ Form::label('name1','Miembro 1')}}
{{ Form::select('name1',$academics, null, ['class'=>'form-control','id' =>'name']) }}
{{ Form::label('academic_role1','Rol del Miembro 1')}}
{{ Form::text('academic_role1',null, ['class'=>'form-control','id' =>'academic_role']) }}

{{ Form::label('name2','Miembro 2')}}
{{ Form::select('name2',$academics, null, ['class'=>'form-control','id' =>'name']) }}
{{ Form::label('academic_role2','Rol del Miembro 2')}}
{{ Form::text('academic_role2',null, ['class'=>'form-control','id' =>'academic_role']) }}

{{ Form::label('name3','Miembro 3')}}
{{ Form::select('name3',$academics, null, ['class'=>'form-control','id' =>'name']) }}
{{ Form::label('academic_rol3','Rol del Miembro 3')}}
{{ Form::text('academic_rol3',null, ['class'=>'form-control','id' =>'academic_role']) }}

</div>

<div class="form-group text-center">
  {{
    Form::submit('Registrar Miembros',['class'=>'btn btn-success'])
  }}
</div>