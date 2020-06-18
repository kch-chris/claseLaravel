@extends('layouts.app')

@section('content')
    <div class="col-12">
        Crea un nuevo Rol
    </div>

    @php
        echo Form::open(['route' => 'users.store', 'method' => 'post']);
            echo Form::label('name', 'Name', ['class' => 'awesome']);
            echo Form::text('name',null, array_merge(['class' => 'form-control']));
            echo "<span id='error_name'>".($errors->first('name') != null)?$errors->first('name'):""."</span>";
            echo "<br>";
            echo Form::label('email', 'Email', ['class' => 'awesome']);
            echo Form::text('email',null, array_merge(['class' => 'form-control']));
            echo "<span id='error_email'>".($errors->first('email') != null)?$errors->first('email'):""."</span>";
            
            echo Form::label('password', 'Paswoord', ['class' => 'awesome']);
            echo Form::password('password', ['class' => 'form-control']);
            echo "<span id='error_password'>".($errors->first('password') != null)?$errors->first('password'):""."</span>";

            echo Form::label('password_confirmation', 'Confirm Paswoord', ['class' => 'awesome']);
            echo Form::password('password_confirmation', ['class' => 'form-control']);
            echo "<span id='error_password_confirmation'>".($errors->first('password_confirmation') != null)?$errors->first('password_confirmation'):""."</span>";
            
            echo Form::label('role', 'Role', ['class' => 'awesome']);
     @endphp
            <select name="role" id="role" class="form-control">
                @foreach($roles as $role)
                    <option value="{{ $role->name }}"> {{ $role->name }}</option>
                @endforeach
            </select>

    @php

            echo "<br>";
            echo Form::submit('Save', ['class'=>'btn btn-primary']);
        echo Form::close();
    @endphp
@endsection()