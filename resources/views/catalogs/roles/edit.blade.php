@extends('layouts.app')

@section('content')
    <div class="col-12">
        Editar Rol
    </div>

    @php
        echo Form::open(['url' => 'roles/'.$role->id , 'method' => 'put']);
            echo Form::label('name', 'Name', ['class' => 'awesome']);
            echo Form::text('name', $role->name, array_merge(['class' => 'form-control']));
            echo "<span id='error_name'>".($errors->first('name') != null)?$errors->first('name'):""."</span>";
            echo "<br>";

            echo Form::hidden('guard_name', $role->guard_name, array_merge(['class' => 'form-control']));

            echo Form::submit('Save', ['class'=>'btn btn-primary']);
        echo Form::close();
    @endphp
@endsection()