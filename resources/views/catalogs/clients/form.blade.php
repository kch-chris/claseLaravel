@extends('layouts.app')

@section('content')
    <div class="col-12">
        Crea un nuevo Cliente
    </div>

    @php
        echo Form::open(['url' => $url, 'method' => $method]);
        echo '<div class="row">';
            echo '<div class="col-10">';
                echo '<div class="card">';
                    echo '<div class="card-body">';
                    echo '<h4 class="card-title">Create Product</h4>';
                    echo '<div class="row">';
                    echo Form::label('name', 'Name', ['class' => 'awesome']);
                    echo Form::text('name', (isset($client))? $client->name : null, array_merge(['class' => 'form-control']));
                    echo "<span id='error_name'>".($errors->first('name') != null)?$errors->first('name'):""."</span>";
                    echo "<br>";
                    
                    echo Form::label('lastname', 'LastName', ['class' => 'awesome']);
                    echo Form::text('lastname', (isset($client))? $client->lastname : null, array_merge(['class' => 'form-control']));
                    echo "<span id='error_lastname'>".($errors->first('lastname') != null)?$errors->first('lastname'):""."</span>";
                    echo "<br>";
                    
                    echo Form::label('email', 'Email', ['class' => 'awesome']);
                    echo Form::text('email', (isset($client))? $client->email : null, array_merge(['class' => 'form-control']));
                    echo "<span id='error_email'>".($errors->first('email') != null)?$errors->first('email'):""."</span>";
                    echo "<br>";
                    
                    echo Form::label('phone', 'Phone', ['class' => 'awesome']);
                    echo Form::text('phone', (isset($client))? $client->phone : null, array_merge(['class' => 'form-control']));
                    echo "<span id='error_phone'>".($errors->first('phone') != null)?$errors->first('phone'):""."</span>";
                    echo "<br>";
                    
                    echo Form::label('age', 'Age', ['class' => 'awesome']);
                    echo Form::text('age', (isset($client))? $client->age : null, array_merge(['class' => 'form-control']));
                    echo "<span id='error_age'>".($errors->first('age') != null)?$errors->first('age'):""."</span>";
                    echo "<br>";
                    
                    echo Form::label('sex', 'Sex', ['class' => 'awesome']);
                    echo Form::text('sex', (isset($client))? $client->sex : null, array_merge(['class' => 'form-control']));
                    echo "<span id='error_sex'>".($errors->first('sex') != null)?$errors->first('sex'):""."</span>";
                    echo "<br>";
                    
                    echo Form::label('credit', 'Credit', ['class' => 'awesome']);
                    echo Form::text('credit', (isset($client))? $client->credit : null, array_merge(['class' => 'form-control']));
                    echo "<span id='error_credit'>".($errors->first('credit') != null)?$errors->first('credit'):""."</span>";
                    echo "<br>";
                    echo "<div class='form-actions'>";
                        echo '<div class="text-right">';
                            echo Form::submit('Save', ['class'=>'btn btn-primary']);
                        echo "</div>";
                    echo "</div>";
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
        echo Form::close();
    @endphp
@endsection()