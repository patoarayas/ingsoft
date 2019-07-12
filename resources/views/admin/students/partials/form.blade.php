<div class="form-group">

    {{ Form::label('name','NOMBRE')}}
    {{ Form::text('name',null, ['class'=>'form-control','id' =>'name']) }}
    <br>
    {{ Form::label('rut','RUT')}}
    {{ Form::text('rut',$rutSinGuion,['class'=>'form-control','id'=>'rut' ,'readonly', 'name'=>'rut','value'=>'$rutSinGuion','placeholder'=>'$rutSinGuion'])}}
    <br>
    {{ Form::label('email','E-MAIL')}}
    {{ Form::email('email',$student->email, ['class'=>'form-control','id' =>'email']) }}
    <br>
    {{ Form::label('phone','TELÉFONO')}}
    {{ Form::number('phone',$student->phone, ['class'=>'form-control','id' =>'phone']) }}
    <br>
    {{ Form::label('label-careers','CARRERAS')}}
    <br>

</div>

<div class="form-group">
        <input type="checkbox" name="career1" value="Ingeniería en Computación e Informática"> Ingeniería en Computación e Informática<br>
    </div>

    <div class="form-group">
        <input type="checkbox" name="career2" value="Ingeniería Ejecución en Computación e Informática"> Ingeniería Ejecución en Computación e Informática<br>
    </div>

    <div class="form-group">
        <input type="checkbox" name="career3" value="Ingeniería Civil en Computación e Informática (Malla-Nueva)"> Ingeniería Civil en Computación e Informática (Malla-Nueva)<br>
    </div>

    <div class="form-group">
        <input type="checkbox" name="career4" value="Ingeniería Civil en Computación e Informática (Malla-Antigua)"> Ingeniería Civil en Computación e Informática (Malla-Antigua)<br>
    </div>
</div>

<div class="form-group text-center">
    {{
      Form::submit('Guardar Datos',['class'=>'btn btn-success'])
    }}
</div>
