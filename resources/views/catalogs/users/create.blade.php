@extends('layouts.app')

@section('content')
    <div class="col-12">
        Crea un nuevo Usuario
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
            echo "<br>";   

            echo Form::label('password', 'Password', ['class' => 'awesome']);
            echo Form::password('password', ['class' => 'form-control']);
            echo "<span id='error_password'>".($errors->first('password') != null)?$errors->first('password'):""."</span>";
            echo "<br>";   

            echo Form::label('password_confirmation', 'Password Confirm', ['class' => 'awesome']);
            echo Form::password('password_confirmation', ['class' => 'form-control2']);
            echo "<span id='password_confirmation'>".($errors->first('password_confirmation') != null)?$errors->first('password_confirmation'):""."</span>";
            echo "<br>";           
            
            echo Form::submit('Save', ['class'=>'btn btn-primary']);
        echo Form::close();
    @endphp
@endsection()