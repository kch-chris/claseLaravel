@extends('layouts.app')

@section('content')
    <div class="col-12">
        Crea un nuevo Cliente
    </div>

    @php
        echo Form::open(['url' => 'clients/'.$client->clientsID , 'method' => 'put']);
            echo Form::label('name', 'Name', ['class' => 'awesome']);
            echo Form::text('name', $client->name, array_merge(['class' => 'form-control']));
            echo "<span id='error_name'>".($errors->first('name') != null)?$errors->first('name'):""."</span>";
            echo "<br>";
            
            echo Form::label('lastname', 'LastName', ['class' => 'awesome']);
            echo Form::text('lastname', $client->lastname, array_merge(['class' => 'form-control']));
            echo "<span id='error_lastname'>".($errors->first('lastname') != null)?$errors->first('lastname'):""."</span>";
            echo "<br>";
            
            echo Form::label('email', 'Email', ['class' => 'awesome']);
            echo Form::text('email', $client->email, array_merge(['class' => 'form-control']));
            echo "<span id='error_email'>".($errors->first('email') != null)?$errors->first('email'):""."</span>";
            echo "<br>";
            
            echo Form::label('phone', 'Phone', ['class' => 'awesome']);
            echo Form::text('phone', $client->phone, array_merge(['class' => 'form-control']));
            echo "<span id='error_phone'>".($errors->first('phone') != null)?$errors->first('phone'):""."</span>";
            echo "<br>";
            
            echo Form::label('age', 'Age', ['class' => 'awesome']);
            echo Form::text('age', $client->age, array_merge(['class' => 'form-control']));
            echo "<span id='error_age'>".($errors->first('age') != null)?$errors->first('age'):""."</span>";
            echo "<br>";
            
            echo Form::label('sex', 'Sex', ['class' => 'awesome']);
            echo Form::text('sex', $client->sex, array_merge(['class' => 'form-control']));
            echo "<span id='error_sex'>".($errors->first('sex') != null)?$errors->first('sex'):""."</span>";
            echo "<br>";
            
            echo Form::label('credit', 'Credit', ['class' => 'awesome']);
            echo Form::text('credit', $client->credit, array_merge(['class' => 'form-control']));
            echo "<span id='error_credit'>".($errors->first('credit') != null)?$errors->first('credit'):""."</span>";
            echo "<br>";

            echo Form::submit('Save', ['class'=>'btn btn-primary']);
        echo Form::close();
    @endphp
@endsection()