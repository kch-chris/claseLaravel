@extends('layouts.app')

@section('content')
    <div class="col-12">
        Edit Permission
    </div>

    @php
        echo Form::open(['url' => 'permissions/'.$permission->id , 'method' => 'put']);
            echo Form::label('name', 'Name', ['class' => 'awesome']);
            echo Form::text('name', $permission->name, array_merge(['class' => 'form-control']));
            echo "<span id='error_name'>".($errors->first('name') != null)?$errors->first('name'):""."</span>";
            echo "<br>";

            echo Form::hidden('guard_name', $permission->guard_name, array_merge(['class' => 'form-control']));

            echo Form::submit('Save', ['class'=>'btn btn-primary']);
        echo Form::close();
    @endphp
@endsection()