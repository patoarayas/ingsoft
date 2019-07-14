<div class="form-group">

    {{ Form::label('name','NOMBRE')}}
    {{ Form::text('name',null, ['class'=>'form-control','id' =>'name']) }}
    <br>
    {{ Form::label('rut','RUT')}}
    {{ Form::text('rut',$rutSinGuion,['class'=>'form-control','id'=>'rut' ,'readonly', 'name'=>'rut','value'=>'$rutSinGuion','placeholder'=>'$rutSinGuion'])}}
    <br>
    {{ Form::label('email','E-MAIL')}}
    {{ Form::email('email',$academic->email, ['class'=>'form-control','id' =>'email']) }}
</div>

<div class="form-group text-center">
    {{
      Form::submit('Guardar Datos',['class'=>'btn btn-success'])
    }}
</div>