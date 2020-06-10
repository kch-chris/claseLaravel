@extends('layouts.app')

@section('content')
    <div class="col-12">
        Crea un nuevo Rol
    </div>

    @php
        echo Form::open(['route' => 'rolepermissions.store', 'method' => 'post']);
            echo Form::label('role_id', 'Rol', ['class' => 'awesome']);
            echo Form::text('role_id',null, array_merge(['class' => 'form-control']));
            echo "<span id='error_role_id'>".($errors->first('role_id') != null)?$errors->first('role_id'):""."</span>";
            echo "<br>";

            echo Form::select('role_id', array(
                'Cats' => array('leopard' => 'Leopard'),
                'Dogs' => array('spaniel' => 'Spaniel'),
            ));
            
            echo Form::submit('Save', ['class'=>'btn btn-primary']);
        echo Form::close();
    @endphp
@endsection()