@extends('layouts.app')

@section('content')
    <div class="col-12">
        Crea un nuevo Cliente
    </div>

    @php
        echo Form::open(['route' => 'clients.store', 'method' => 'post']);
            echo Form::label('name', 'Name', ['class' => 'awesome']);
            echo Form::text('name', null, array_merge(['class' => 'form-control']));
            echo "<span id='error_name'>".($errors->first('name') != null)?$errors->first('name'):""."</span>";
            echo "<br>";
            
            echo Form::label('lastname', 'LastName', ['class' => 'awesome']);
            echo Form::text('lastname', null, array_merge(['class' => 'form-control']));
            echo "<span id='error_lastname'>".($errors->first('lastname') != null)?$errors->first('lastname'):""."</span>";
            echo "<br>";
            
            echo Form::label('email', 'Email', ['class' => 'awesome']);
            echo Form::text('email', null, array_merge(['class' => 'form-control']));
            echo "<span id='error_email'>".($errors->first('email') != null)?$errors->first('email'):""."</span>";
            echo "<br>";
            
            echo Form::label('phone', 'Phone', ['class' => 'awesome']);
            echo Form::text('phone', null, array_merge(['class' => 'form-control']));
            echo "<span id='error_phone'>".($errors->first('phone') != null)?$errors->first('phone'):""."</span>";
            echo "<br>";
            
            echo Form::label('age', 'Age', ['class' => 'awesome']);
            echo Form::text('age', null, array_merge(['class' => 'form-control']));
            echo "<span id='error_age'>".($errors->first('age') != null)?$errors->first('age'):""."</span>";
            echo "<br>";
            
            echo Form::label('sex', 'Sex', ['class' => 'awesome']);
            echo Form::text('sex', null, array_merge(['class' => 'form-control']));
            echo "<span id='error_sex'>".($errors->first('sex') != null)?$errors->first('sex'):""."</span>";
            echo "<br>";
            
            echo Form::label('credit', 'Credit', ['class' => 'awesome']);
            echo Form::text('credit', null, array_merge(['class' => 'form-control']));
            echo "<span id='error_credit'>".($errors->first('credit') != null)?$errors->first('credit'):""."</span>";
            echo "<br>";

            echo Form::submit('Save', ['class'=>'btn btn-primary']);
        echo Form::close();
    @endphp
@endsection()