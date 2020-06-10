@extends('layouts.app')

@section('content')
    <div class="col-12">
        Crea un nuevo Rol
    </div>

    @php
        echo Form::open(['route' => 'roles.store', 'method' => 'post']);
            echo Form::label('name', 'Name', ['class' => 'awesome']);
            echo Form::text('name',null, array_merge(['class' => 'form-control']));
            echo "<span id='error_name'>".($errors->first('name') != null)?$errors->first('name'):""."</span>";
            echo "<br>";

            echo Form::hidden('guard_name', "web", array_merge(['class' => 'form-control']));


            echo Form::submit('Save', ['class'=>'btn btn-primary']);
        echo Form::close();
    @endphp
@endsection()