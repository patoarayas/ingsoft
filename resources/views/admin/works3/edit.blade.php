@extends('layouts.layout')

@section('content')
<div class ="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    <a href ="{{route('works3.index')}}"class="btn btn-primary  float-left">Volver</a>
                    Fecha examen de título: {{$work->title}}
                    <div class ="card-body text-left">

                  {!! Form::model($work,['route' =>['works3.update',$work->id],'method' => 'PUT']) !!}
                        @include('admin.works3.partials.form')
                    {!!Form::close()!!}
                
                    
                    <div>
                </div>
                <!-- aca hacemos el llamado al form que se encargara de recibir los datos y guardarlos-->
            </div>
        </div>
    </div>
</div>
@endsection