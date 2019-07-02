@extends('layouts.layout')

@section('content')
<div class ="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    <a href ="{{route('students.index')}}"class="btn btn-primary float-left">Volver</a>
                    EDITAR ESTUDIANTE RUT: {{$rutFormateado}} .
                    <div class ="card-body text-left">
                    {!! Form::model($student,['route' =>['students.update',$student->id],'method' => 'PUT']) !!}
                    @include('admin.students.partials.form')
                    {!!Form::close()!!}
                    </div>
                </div>
                <!-- aca hacemos el llamado al form que se encargara de recibir los datos y guardarlos-->
            </div>
        </div>
    </div>
</div>
@endsection
