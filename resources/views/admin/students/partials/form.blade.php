<div class="form-group">
    {{Form::label('name', 'Nombre: ')}}
    {{Form::text('name',null,['class' => 'form-control','id'=>'nombre'])}}

    {{Form::label('rut', 'Rut: ')}}
    {{Form::text('rut',null,['class' => 'form-control','id'=>'rut'])}}    
    
    {{Form::label('email', 'E-mail: ')}}
    {{Form::text('email',null,['class' => 'form-control','id'=>'email'])}}

    {{Form::label('phone', 'Teléfono: ')}}
    {{Form::text('phone',null,['class' => 'form-control','id'=>'phone'])}}

    {{Form::label('career', 'Carrera: ')}}
    {{ Form::select('career',['Ingeniería Civil en Computación e Informática (Malla-Antigua)' => 'Ingeniería Civil en Computación e Informática (Malla-Antigua)',
        'Ingeniería Civil en Computación e Informática (Malla-Nueva)' => 'Ingeniería Civil en Computación e Informática (Malla-Nueva)',
        'Ingeniería Ejecución en Computación e Informática' => 'Ingeniería Ejecución en Computación e Informática',
        'Ingeniería en Computación e Informática' => 'Ingeniería en Computación e Informática'],null,['class'=>'form-control']) }}


</div>

<div class="form-group text-center">
    {{
      Form::submit('Guardar',['class'=>'btn btn-success'])
    }}
</div>
<!-- Estos 2 forms-group controlan "CREATE" del estudiante-->