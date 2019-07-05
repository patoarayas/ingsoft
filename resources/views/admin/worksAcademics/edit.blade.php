@extends('layouts.layout')

@section('content')
<div class ="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    <a href ="{{route('works.index')}}"class="btn btn-primary  float-left">Volver</a>
                    Comisión correctora
                    <div class ="card-body text-left">

                    {!! Form::model($work,['route' =>['worksAcademics.update',$work->id],'method' => 'PUT']) !!}
                        @include('admin.worksAcademics.partials.form')
                    {!!Form::close()!!}


                    <div>
                </div>
                <!-- aca hacemos el llamado al form que se encargara de recibir los datos y guardarlos-->
            </div>
        </div>
    </div>
</div>
@endsection
